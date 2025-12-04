<?php
function parseCheck(array $query):array{
    $allowedfilter=['name','role','email','status'];
    $allowedsort=['asc','dsc'];
    $maxlimit=100;
$result=[
    'filter'=>[],
    'sort'=>'asc',
    'limit'=>20
];
if(isset($query['filter'])&&is_array($query['filter'])){
foreach($query['filter'] as $key=>$value){
    if(is_array($value)){
throw new InvalidArgumentException("invalid argument pass: filter[$key]");
    };
    if(in_array($key,$allowedfilter,true)){
$clean=trim($value);
$clean=preg_replace('/[^\w\s@.-]/',' ',$clean);
$result['filter'][$key]=$clean;
    };
}
}
if(isset($query['sort'])){
    $sort=strtolower($query['sort']);
if(in_array($sort,$allowedsort,true)){
    $result['sort']=$sort;
}
}
if(isset($query['limit'])){
    $limit=(int)$query['limit'];
    if($limit>0&&$limit<$maxlimit){
 $result['limit']=$limit;
    }
}
return $result;
}
try {
    $safesearch=parseCheck($_GET);
} catch (InvalidArgumentException $e) {
   http_response_code(400);
   echo json_encode(['error'=> $e->getmessage()]);
}
?>