<?php
  $dom = new DOMDocument('1.0', 'utf-8');

  $output_file = shell_exec("ls output/");
  array_pop($output_file);
  for($output_file as $file){
    $anchor = $dom->createElement('a', $file);
    $anchor->setAttribute('href', $file);
    link_anchor($anchor, "/output/".$file);
    $anchor->setAttribute('download',"");    
    $dom->appendChild($anchor);
    
    add_n_space($dom, 2);
    
    $anchor = $dom->createElement('a', "preview");
    link_anchor($anchor, "/output/".$file);
    $dom->appendChild($anchor);    
  }

  echo $dom->saveHTML();


  function link_anchor($anchor,$filename){
    $anchor->setAttribute('href', $filename);
    $anchor->setAttribute('target', '_blank');    
  }
  function add_n_space($dom, $n){
    for($i = 0; $i < $n; $i++){
      add_space($dom);
    }
  }
  function add_space($dom){
    //&amp;nbsp;
    $template = $dom->createDocumentFragment();
    $template->appendXML('&#160;');
    $dom->appendChild($template);
  }
  function add_br($dom){
    $br = $dom->createElement('br');
    $dom->appendChild($br);    
  }
?>
