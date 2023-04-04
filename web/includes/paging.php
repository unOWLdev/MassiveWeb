<?php

require('connect.php');

$db=$connect; // enter your connection variable

// current page number
function current_page(){
  if (isset($_GET['page']) && $_GET['page']!="") {
      $currentPage = validate($_GET['page']);
  } else {
      $currentPage = 1;
  }
 return $currentPage;
}

// validate current page number
function validate($value) {
  $value = trim($value);
  $value = stripslashes($value);
  $value = htmlspecialchars($value);
  return $value;
}

// fetching padination data
function pagination_records($totalRecordsPerPage,$tableName){

   global $db;
   $currentPage=current_page();
   $totalPreviousRecords = ($currentPage-1) * $totalRecordsPerPage; 

   $query = $db->prepare("SELECT * FROM ".$tableName." LIMIT ?, ?");
   $query->bind_param('ii',$totalPreviousRecords,$totalRecordsPerPage); 
   $query->execute();
   $result=$query->get_result();

   if($result->num_rows>0){
    $row= $result->fetch_all(MYSQLI_ASSOC);
    return $row;  
        
    }else{
    return $row=[];
   }
}

// serial number of pagination content
function pagination_records_counter($totalRecordsPerPage){
 
    $currentPage=current_page();
    $totalPreviousRecords=($currentPage-1)*$totalRecordsPerPage;
    $dataCounter=$totalPreviousRecords + 1;
    return $dataCounter;
}

// back to previous page
function previous_page(){

 $currentPage=current_page();
 $previousPage = $currentPage - 1;
 if($currentPage > 1){
   $previous="<li class='page-item'><a class='page-link' href='/bnbs/".$previousPage."'>Previous</a></li>";
   return $previous;
 }  
}

// go to next page
function next_page($totalPages){

 $currentPage=current_page();
 $nextPage = $currentPage + 1;
 if($currentPage < $totalPages) {
  $next="<li class='page-item'><a class='page-link' href='/bnbs/".$nextPage."'
>Next</a></li>";
  return $next;
}}

// diplaying total pagination numbers
function pagination_numbers($totalPages){
    
$currentPage=current_page();

    $adjacents = "2";
$second_last = $totalPages - 1; // total pages minus 1

 $pagelink='';
 if ($totalPages <= 5){   
 for ($counter = 1; $counter <= $totalPages; $counter++){
 if ($counter == $currentPage) {
  $pagelink.= "<li class='page-item'><a class='page-link'class='active'>".$counter."</a></li>"; 
 }else{
  $pagelink.= "<li class='page-item'><a class='page-link' href='/bnbs/".$counter."'>".$counter."</a></li>";
  }
 }
}elseif ($totalPages > 5){
   if($currentPage <= 4) { 
    for ($counter = 1; $counter < 8; $counter++){ 
     if ($counter == $currentPage) {
        $pagelink.= "<li class='page-item'><a class='page-link'class='active' href='/bnbs/".$counter."'>".$counter."</a></li>";
      }else{
           $pagelink.= "<li class='page-item'><a class='page-link' href='/bnbs/".$counter."'>".$counter."</a></li>";
      }
    }
 $pagelink.= "<a>...</a></li>";
 $pagelink.= "<li class='page-item'><a class='page-link' href='/bnbs/".$second_last."'>".$second_last."</a></li>";
 $pagelink.= "<li class='page-item'><a class='page-link' href='/bnbs/".$totalPages."'>".$totalPages."</a></li>";
}elseif($currentPage > 4 && $currentPage < $totalPages - 4) { 
 $pagelink.= "<li class='page-item'><a class='page-link' href='?=1'>1</a></li>";
 $pagelink.= "<li class='page-item'><a class='page-link' href='/bnbs/2'>2</a></li>";
 $pagelink.= "<a>...</a></li>";
for (
     $counter = $currentPage - $adjacents;
     $counter <= $currentPage + $adjacents;
     $counter++
     ) { 
     if ($counter == $currentPage) {
       $pagelink.= "<li class='page-item'><a class='page-link' class='active'>".$counter."</a></li>"; 
     }else{
        $pagelink.= "<li class='page-item'><a class='page-link' href='/bnbs/".$counter."'>".$counter."</a></li>";
     }                  
}
 $pagelink.= "<a>...</a></li>";
 $pagelink.= "<li class='page-item'><a class='page-link' href='/bnbs/".$second_last."'>".$second_last."</a></li>";
 $pagelink.= "<li class='page-item'><a class='page-link' href='/bnbs/".$totalPages."'>".$totalPages."</a></li>";
}else {
 $pagelink.= "<li class='page-item'><a class='page-link' href='/bnbs/1'>1</a></li>";
 $pagelink.= "<li class='page-item'><a class='page-link' href='/bnbs/2'>2</a></li>";
 $pagelink.= "<a>...</a></li>";
for (
     $counter = $totalPages - 6;
     $counter <= $totalPages;
     $counter++
     ) {
     if ($counter == $currentPage) {
       $pagelink.= "<li class='page-item'><a class='page-link'class='active'>".$counter."</a></li>"; 
       }else{
        $pagelink.= "<li class='page-item'><a class='page-link' href='/bnbs/".$counter."'>".$counter."</a></li>";
       }                   
}}}
return $pagelink;
}

// final script to create pagination
function pagination($totalRecordsPerPage,$tableName){

 $currentPage=current_page();
 global $db; 
 $query ="SELECT * FROM ".$tableName;
 $result=$db->query($query);
 
 $totalRecords=$result->num_rows;
 $totalPages = ceil($totalRecords / $totalRecordsPerPage);

 $pagination='';
 $pagination.=previous_page();
 $pagination.=pagination_numbers($totalPages);
 $pagination.=next_page($totalPages);

  return $pagination;
}
?>