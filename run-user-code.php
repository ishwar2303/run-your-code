<?php 
    $error = "<span style='color:red;'>Error</span>";
    $success = "<span style='color:#8ae234;'>Program Finished</span>";
    if(isset($_POST['userCode']) && isset($_POST['langName'])){
        $userCode = $_POST['userCode'];
        $langName = $_POST['langName'];
        if($langName == 1){ // php code execution
            if($userCode != ''){
                $userCode = $userCode."\n";
                $output_file = fopen('php-code.php', "w");
                fwrite($output_file, '');
                fwrite($output_file, $userCode);
                $raw_file = fopen('raw.txt', "w");
                fwrite($raw_file, $userCode);
                exec('C:/xampp/php/php.exe php-code.php 2>&1', $output, $return);
                if(!$return){
                    foreach($output as $value){
                        echo $value;
                        echo "<br/>";
                    }
                    echo $success;
                }
                else{
                    echo $error;
                    foreach($output as $value){
                        echo $value;
                        echo "<br/>";
                    }
                }
                ?>
                <!-- <script>
                    url_file = 'php-code.php'
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
                                    output = output.trim()
                                    el.innerHTML = output.replace(/(?:\r\n|\r|\n)/g, '<br/>')
                            }
                        })
                </script> -->
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
            $raw_file = fopen('raw.txt', "w");
            fwrite($raw_file, $userCode);
            exec('gcc c-code.c  2>&1', $output, $return);
            if(!$return){
                exec('a.exe', $output, $return);
                foreach($output as $value){
                    echo $value;
                    echo "<br/>";
                }
                echo $success;
            }
            else{
                echo $error;
                foreach($output as $value){
                    echo $value;
                    echo "<br/>";
                }
            }
        }
        else if($langName == 3){ // C++ code execution
            $output_file = fopen('cpp-code.cpp', "w");
            fwrite($output_file, $userCode);
            $raw_file = fopen('raw.txt', "w");
            fwrite($raw_file, $userCode);
            exec('g++ cpp-code.cpp  2>&1', $output, $return);
            if(!$return){
                exec('a.exe', $output, $return);
                foreach($output as $value){
                    echo $value;
                    echo "<br/>";
                }
                echo $success;
            }
            else{
                echo $error;
                foreach($output as $value){
                    echo $value;
                    echo "<br/>";
                }
            }
        }
        else if($langName == 4){ // Python code execution
            $output_file = fopen('python-code.py', "w");
            fwrite($output_file, $userCode);
            $raw_file = fopen('raw.txt', "w");
            fwrite($raw_file, $userCode);
            $pgm_output = exec('python python-code.py 2>&1', $output, $return);
            
            foreach($output as $value){
                echo $value;
                echo "<br/>";
            }
            if(!$return)
                echo $success;
            else echo $error;
        }
    }

?>
<div id="returned-output">
    
</div>
<script>
        //$('.overlay').toggle()
        runBtn = document.getElementById('run-code-btn')
        runBtn.innerHTML = 'Run'
        runBtn.disabled = false
        document.getElementById('raw-code-link').style.display = 'block'
        stopBtn = document.getElementById('stop-btn')
        stopBtn.style.background = 'rgb(205 205 205)'
        stopBtn.disabled = true
        <?php 
            if($return){
                ?>
                document.getElementById('error-btn').style.display = 'block'
                document.getElementById('success-btn').style.display = 'none'
                <?php
            }
            else{
                ?>
                document.getElementById('error-btn').style.display = 'none'
                document.getElementById('success-btn').style.display = 'block'
                <?php
            }
        ?>
</script>
