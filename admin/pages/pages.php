<?php

$content = scandir('.\\data\\HTML\\');
$contents = [];
foreach ($content as $item){
    if(str_contains($item, '.html')){
        $contents[] = $item;
    }
}


function getSize(){
    $i = 0;
    foreach ($GLOBALS['contents'] as $item){
        $i++;
    }
    return $i;
}


// Function to retrieve and list all pages
function getPageTitle($id)
{
    return ($GLOBALS['contents'][$id]);
}


function getPageContent($id)
{

    $data = file_get_contents('../../data/HTML/'.$GLOBALS['contents'][$id]);
    return $data;

}

function createPage($name){
    if (file_exists('../../data/HTML/'.$name['file_name'].'.html')){
        echo 'File already exists';
    }
    else{
        file_put_contents('../../data/HTML/'.$name['file_name'].'.html', $name['file_contents']);
        array_push($GLOBALS['contents'], ($name['file_name'].'.html'));
        
    }
}

function deletePage($name,$index){
    if (!file_exists('../../data/HTML/'.$name)){
        echo 'File Does not exists';
    }
    else{
        $path = dirname(__DIR__,2).'\\data\\HTML\\'.$name;
        unlink($path);
        unset($GLOBALS['contents'][$index]);
        $newcontent = [];
        foreach($GLOBALS['contents'] as $item){
            array_push($newcontent, $item);
        }
        $GLOBALS['contents'] = $newcontent;
        
        
    }
}


?>