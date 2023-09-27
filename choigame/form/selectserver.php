<?php
session_start();
define("Gun4S.Net",true);
include "../#config.php";
include "../function.php";
$getserver = explode('|',$serverlist);
$i = 1;
while($getserver[$i-1] != ''){
	$i++;
}
$i--;
?>

                <div class="Content">
                    <div class="InfoServer">
                            &nbsp;
                            
                    </div>



    <a href="#" class="BtnChoiNgay" rel="1" title="Gà Kỵ Binh">Chơi ngay</a>
                           
<div class="NewServer">

        


<a class="MoiNhat" href="javascript:void(0)" onclick="choiGame(1)" title="<?=$getserver[1];?>" ><?=$getserver[1];?></a>

       

<a class="DongNhat" href="javascript:void(0)" onclick="choiGame(1)" title="<?=$getserver[0];?>" ><?=$getserver[0];?></a>

 
        
                       
                    </div>
                    <div class="BoxServer">
                        
                        <div class="ListServer">                                             
                            <div id="nav">
                                <ul id="tabHeader">
                                    <li  class="Active"><a title="Danh sách các máy chủ" href="#">Danh sách</a></li>
                                </ul>
                                
                              
                        <ul id="S1" class="Active ServerList">
						<?php
						$num2 = 1;
						$i++;
						while($num2 != $i){
							$activeserverlist .= '<li><a href="javascript:void(0)" onclick="choiGame('.$num2.')" title="'.$getserver[$num2-1].'" ><span> '.$num2.'</span> <span class="Tot">Tốt</span> '.$getserver[$num2-1].'</a>
								</li>';
													$num2++;
						}
						
						?>
										<?=$activeserverlist;?>							
					<br>

                               </ul>
                            </div>
                        </div>
                    </div>
    
                    
                </div>