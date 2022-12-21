<?php

  // Fungsi ini membangun permintaan pencarian dari kata kunci pencarian dan semacam pengaturan
  function build_query($user_search) {
    $search_query = "SELECT * FROM smp INNER JOIN kecamatan ON smp.id_kecamatan=kecamatan.id_kecamatan";

    // Ekstrak kata kunci pencarian ke dalam array
    $clean_search = str_replace(',', ' ', $user_search);
    $search_words = explode(' ', $clean_search);
    $final_search_words = array();
    if (count($search_words) > 0) {
      foreach ($search_words as $word) {
        if (!empty($word)) {
          $final_search_words[] = $word;
        }
      }
    }

    // Menghasilkan klausa dimana menggunakan semua kata kunci pencarian
    $where_list = array();
    if (count($final_search_words) > 0) {
      foreach($final_search_words as $word) {
        $where_list[] = "nama LIKE '%$word%'";
      }
    }
    $where_clause = implode(' OR ', $where_list);

    // menambahkan kata kunci klausa WHERE untuk permintaan pencarian
    if (!empty($where_clause)) { 
      $search_query .= " WHERE $where_clause";
    }
    return $search_query;
  }

  // Fungsi ini membangun link menuju berdasarkan jenis pengaturan ditentukan

  // Fungsi ini membangun link halaman navigasi berdasarkan halaman saat ini dan jumlah halaman
  function generate_page_links($user_search, $cur_page, $num_pages) {
    $page_links = '';

    // Jika halaman ini tidak halaman pertama, menghasilkan "sebelumnya" link
    if ($cur_page > 1) {
      $page_links .= '<li><a aria-label="Previous" href="' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&page=' . ($cur_page - 1) . '"><span aria-hidden="true">&laquo;</span></a></li> ';
    }
    else {
      $page_links .= '<li><a aria-label="Previous" href="#"><span aria-hidden="true">&laquo;</span></a></li>';
    }

    // Loop melalui halaman menghasilkan link nomor halaman
    for ($i = 1; $i <= $num_pages; $i++) {
      if ($cur_page == $i) {
        $page_links .= '<li><a href="#">'.$i.'</a></li>' ;
      }
      else {
        $page_links .= '<li><a href="' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&page=' . $i . '"> ' . $i . '</a></li>';
      }
    }

    // Jika halaman ini tidak halaman terakhir, menghasilkan "berikutnya" link
    if ($cur_page < $num_pages) {
      $page_links .= '<li><a href="' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&page=' . ($cur_page + 1) . '">-></a></li>';
    }
    else {
      $page_links .= ' <li><a href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
    }

    return $page_links;
  }

  // mengammbil pengaturan semacam dan kata kunci pencarian dari URL menggunakan GET
  if(isset($_GET['usersearch'])){
	$user_search = $_GET['usersearch'];
  }else{
	$user_search = "";
  }

  // Hitung informasi nomor halaman
  $cur_page = isset($_GET['page']) ? $_GET['page'] : 1;
  $results_per_page = 8;  // number of results per page
  $skip = (($cur_page - 1) * $results_per_page);

  // Connect to the database
  //require_once('koneksi.php');
  //$dbc = mysql_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

  // Query untuk mendapatkan total hasil
  $query = build_query($user_search);
  $result = mysqli_query($dbc, $query);
  $total = mysqli_num_rows($result);
  $num_pages = ceil($total / $results_per_page);

  // query (permintaan) hanya untuk mendapatkan hasil
  $query =  $query . " LIMIT $skip, $results_per_page";
  $result = mysqli_query($dbc, $query);
  
  while ($row = mysqli_fetch_array($result)) {
    echo' <tbody>';
 echo'  <tr >';

                
                  
                 
                  
                     echo '<td align="">'. $row['nama'].'</td>';
                     if($row['status']==0)
                     {
                      echo' <td align="">swasta</td>';
                     }
                     else
                     {
                      echo' <td align="">negeri</td>';
                     }
                         
                   
                    echo'<td align="">'. $row['nama_kecamatan'].' </td>';
                   
                   echo' <td align="">'.$row['alamat'].'</td>';
                   
                   // echo' <td align="">'.$row['lat'].'</td>';
                   // echo' <td align="">'.$row['lng'].'</td>';
                   // echo' <td align="">'.$row['c1'].'</td>';
                   // echo' <td align="">'.$row['c2'].'</td>';
                   // echo' <td align="">'.$row['c3'].'</td>';
                
                 
                 echo'<td  align=""> <a href=" smp_edit.php?id_smp='.$row['id_smp'].' "> <i style="color: black;" class="fa fa-pencil-square-o"></i></a></td>';
                 echo' <td  align=""><a href="smp.php?id_smp='.$row['id_smp'] .'"><i  style="color: black;" class="fa fa-trash-o"></i></a></td>';
               echo' </tr>';
              

  } 
   echo' </tr>';
             
                  echo' </tbody>';
                  echo' </table>';
                               

echo '</div>';// table responsive


  // Menghasilkan link halaman navigasi jika kita memiliki lebih dari satu halaman
  echo '<div class="col-xs-6">';
  echo '<nav>';
  echo '<ul class="pagination">';
  if ($num_pages > 1) {
    echo generate_page_links($user_search, $cur_page, $num_pages);
  }
  echo '</ul>';
  echo '</nav>';
  echo '</div>';
?>	