<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php 
    //print_r($_POST);
    if(isset($_POST['userCode']) && isset($_POST['langName'])){
        $userCode = $_POST['userCode'];
        $langName = $_POST['langName'];
        if($langName == 1){ // php code execution
            if($userCode != ''){
                $userCode = "\n".$userCode."\n";
                //echo str_replace("\n", "<br/>", $userCode);
                $output_file = fopen('output-response.php', "w");
                fwrite($output_file, '');
                fwrite($output_file, $userCode);
                //fwrite($output_file, "unlink('output-response.php');");
                $raw_file = fopen('raw.txt', "w");
                fwrite($raw_file, $userCode);
                ?>
                <script>
                    url_file = 'output-response.php'
                        $.ajax({
                            url : url_file,
                            type : 'POST',
                            dataType : 'html',
                            success : (msg) => {
                            },
                            complete : (res) => {
                                output = res.responseText
                                let el = document.getElementById('returned-output')
                                console.log(output)
                                if(output != '')
                                    el.innerHTML = output.replace(/(?:\r\n|\r|\n)/g, '<br/>')
                            }
                        })
                </script>
                <?php
            }
            else{
                ?>
                <div id="returned-output">
                    No Output
                </div>
                <?php
                    return;
            }
        }
        else if($langName == 2){ // C code execution
            $output_file = fopen('c-code.c', "w");
            fwrite($output_file, $userCode);
            exec('gcc c-code.c', $output, $return);
            if(!$return){
                echo exec('a.exe');
                echo "<br/><br/>Executed Successfully";
            }
            else{
                echo "Error";
            }
        }
        else if($langName == 3){ // C++ code execution
            $output_file = fopen('cpp-code.cpp', "w");
            fwrite($output_file, $userCode);
            exec('g++ cpp-code.cpp', $output, $return);
            if(!$return){
                echo exec('a.exe');
            }
            else{
                echo "Error";
            }
        }
        else if($langName == 4){ // C++ code execution
            $output_file = fopen('python-code.py', "w");
            fwrite($output_file, $userCode);
            $pgm_output = exec('python python-code.py', $output, $return);
            if(!$return){
                echo $pgm_output;
            }
            else{
                echo "Error";
            }
        }
    }

?>
<div id="returned-output">
    
</div>
