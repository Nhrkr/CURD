<!DOCTYPE html>
<!-- saved from url=(0041)http://localhost:8080/FlowChart/index.php -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="UTF-8">
        <title></title>
         <style>
           .black_overlay{
	display: none;
	position: absolute;
	top: 0%;
	left: 0%;
	width: 100%;
	height: 100%;
	background-color: #e6e6e6;
	z-index:9001;
	-moz-opacity: 0.7;
	opacity:.70;
	filter: alpha(opacity=70);
}

.white_content {
	display: none;
	position: absolute;
	top: 25%;
	left: 25%;
	width: 50%;
	height: 50%;
	padding: 16px;
	border: 10px solid black;
	background-color: white;
	z-index:9002;
	overflow: auto;
}   
#close
{
    position:fixed;
    right: 22%;
    top: 28%;
}
        </style>
    </head>
    <body spellcheck="false">
        <div id="fade" class="black_overlay" style="display: block;"></div>
        <p>This is the main content. To display a popup click
            <button onclick=" popup()">here</button>
        </p><div id="light" class="white_content" style="display: block;">This is the popup content.
            <button id="yes" onclick="edit();">Edit</button>
            <button id="yes" onclick="load_home();">YES</button>
  
            <button id="yes" onclick="load_content()">NO</button>
            
        <div id="content"></div>
 
        <div id="close">
            <button value="Close" onclick="popClose()">Close</button>
        </div>
        <div id="edit">
            <form action="" method="POsT">
                <ghost>
                    <div style="position: absolute; color: transparent; overflow: hidden; white-space: pre-wrap; border: 1px solid rgb(169, 169, 169); border-radius: 0px; box-sizing: content-box; height: 119px; width: 293px; margin: 0px; z-index: 0; padding: 2px; top: auto; left: auto; background: none 0% 0% / auto repeat scroll padding-box border-box rgb(255, 255, 255);" data-id="63fa6f7a-5ded-4881-8745-1198448760d9" data-gramm_id="63fa6f7a-5ded-4881-8745-1198448760d9" data-gramm="gramm" data-gramm_editor="true" data-reactid=".2" contenteditable="true"><span style="display: inline-block; color: transparent; overflow: hidden; text-align: left; float: initial; clear: none; box-sizing: border-box; vertical-align: baseline; white-space: pre-wrap; width: 100%; margin: 0px; padding: 0px; border: 0px; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; line-height: normal; font-size: 13.3333330154419px; font-family: monospace; letter-spacing: normal; text-shadow: none; height: 123px;" data-reactid=".2.0"></span><br data-reactid=".2.1"></div></ghost><textarea rows="4" cols="16" style="margin: 0px; height: 119px; overflow: auto; background: transparent !important;" data-gramm="true" data-txt_gramm_id="63fa6f7a-5ded-4881-8745-1198448760d9" data-gramm_id="63fa6f7a-5ded-4881-8745-1198448760d9" data-gramm_editor="true"></textarea><div><div style="z-index: 2; opacity: 1; margin-left: 277px; margin-top: 131px;" class="gr-textarea-btn gr-textarea-btn_show " data-reactid=".3"></div></div>
            </form>
        </div>
        </div>
        
    
     
   
        <script>
            function popClose()
            {
                document.getElementById('light').style.display='none';
                document.getElementById('fade').style.display='none';
            }
            function popup()
            {
                document.getElementById('light').style.display='block';
                document.getElementById('fade').style.display='block';
            }
            function load_home()
            {
                
                
                alert('load new content');
                document.getElementById("light").innerHTML=document.getElementById("data");
            }
            function edit()
            {
               document.getElementById("light").innerHTML='<form action="javascript:load_home();"><input id="data"type=text></input><input type=SUBMIT value="Done"></input>';
               //load_home();
            }
</script>  


</body><span class="gr__tooltip"><span class="gr__tooltip-content"></span><i class="gr__tooltip-logo"></i><span class="gr__triangle"></span></span><div><div class="gr_-editor" style="display:none;" data-reactid=".0"><div class="gr_-editor_back" data-reactid=".0.0"></div><iframe class="gr_-ifr" data-reactid=".0.1"></iframe></div></div><grammarly-card><div style="top:0;left:0;visibility:hidden;" class="gr-grammar-card" data-reactid=".1"><span style="margin-left:0;" class="gr-grammar-card_triangle" data-reactid=".1.0"></span><div class="gr-grammar-card_footer" data-reactid=".1.4"><div class="gr-grammar-card_link" data-reactid=".1.4.0">Correct with Grammarly</div><div class="gr-grammar-card_btn-close gr-grammar-card_ignore" data-reactid=".1.4.2">Ignore</div></div></div></grammarly-card><div><div class="gr-btn-hover-menu gr-btn-hover-menu_freemium-user gr-btn-hover-menu_critical-empty gr-btn-hover-menu_plus-empty" data-reactid=".4"><div class="gr-btn-hover-menu_wrap" data-reactid=".4.0"><div class="gr-btn-hover-menu_line gr-btn-hover-menu_line-plus" data-reactid=".4.0.0"><div class="gr-btn-hover-menu_count" data-reactid=".4.0.0.0">0</div><div class="gr-btn-hover-menu_lbl" data-reactid=".4.0.0.1"><div class="gr-btn-hover-menu_lbl-wrap" data-reactid=".4.0.0.1.0"><div class="gr-btn-hover-menu_menu-plus" data-reactid=".4.0.0.1.0.0">ADVANCED</div><span data-reactid=".4.0.0.1.0.1"> </span><br data-reactid=".4.0.0.1.0.2"><div class="gr-btn-hover-menu_plus-lbl" data-reactid=".4.0.0.1.0.3">issues</div></div></div><div class="gr-btn-hover-menu_btn gr-btn-hover-menu_btn-upgrade" data-reactid=".4.0.0.2">Learn more</div></div><div class="gr-btn-hover-menu_line gr-btn-hover-menu_line-plus-empty" data-reactid=".4.0.1"><div class="gr-btn-hover-menu_lbl" data-reactid=".4.0.1.0"><div class="gr-btn-hover-menu_lbl-wrap" data-reactid=".4.0.1.0.0"><span data-reactid=".4.0.1.0.0.0">No </span><div class="gr-btn-hover-menu_menu-plus" data-reactid=".4.0.1.0.0.1">ADVANCED</div><br data-reactid=".4.0.1.0.0.2"><span data-reactid=".4.0.1.0.0.3">issues</span></div></div><div class="gr-btn-hover-menu_btn gr-btn-hover-menu_btn-upgrade" data-reactid=".4.0.1.1">Learn more</div></div><div class="gr-btn-hover-menu_line gr-btn-hover-menu_line-critical" data-reactid=".4.0.2"><div class="gr-btn-hover-menu_count" data-reactid=".4.0.2.0">0</div><div class="gr-btn-hover-menu_lbl" data-reactid=".4.0.2.1"><div class="gr-btn-hover-menu_lbl-wrap" data-reactid=".4.0.2.1.0"><span data-reactid=".4.0.2.1.0.0">critical </span><br data-reactid=".4.0.2.1.0.1"><div data-reactid=".4.0.2.1.0.2">issues</div></div></div><div class="gr-btn-hover-menu_btn gr-btn-hover-menu_btn-critical" data-reactid=".4.0.2.2">Correct</div></div><div class="gr-btn-hover-menu_line gr-btn-hover-menu_line-critical-empty" data-reactid=".4.0.3"><div class="gr-btn-hover-menu_lbl" data-reactid=".4.0.3.0"><div class="gr-btn-hover-menu_lbl-wrap" data-reactid=".4.0.3.0.0"><span data-reactid=".4.0.3.0.0.0">No critical</span><br data-reactid=".4.0.3.0.0.1"><span data-reactid=".4.0.3.0.0.2">issues</span></div></div><div class="gr-btn-hover-menu_btn gr-btn-hover-menu_btn-critical" data-reactid=".4.0.3.1">Open Grammarly</div></div></div></div></div></html>