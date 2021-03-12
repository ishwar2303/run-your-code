<?php 

    $output_file = fopen('output-response.php', "w");
    fwrite($output_file, '');
    $raw_file = fopen('raw.txt', "w");
    fwrite($raw_file, '');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Run Your Code</title>
    <link rel="stylesheet" href="public/css/main.css">
    <script src="https://kit.fontawesome.com/f9bbf9ac4e.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <?php require 'header.php'; ?>
    <div class="wrapper">
        <div class="operation-header">
            <h3>Run your code in real time.</h3>
            <div class="operations">
                <div id="operations-btn">
                    <button id="run-code-btn" class="cp">Run</button>
                    <button id="success-btn"><i class="fas fa-check"></i> Program Finished</button>
                    <button id="error-btn"><i class="fas fa-exclamation-circle"></i> Error</button>
                    <a id="raw-code-link"  class="cp" href="raw.txt" target="_blank"> 
                        <button id="raw-btn">Raw</button>
                    </a>
                </div>
                <div>
                    <button id="choose-lang">
                        <div id="lang-name">Language : PHP</div>
                        <div class="drop-down">
                            <div>
                                <label>
                                    <input onclick="php_code()" class="pgm-lang-input" type="radio" name="pgm-lang" value="1" checked>
                                    <span class="select-lang">PHP</span>
                                </label>
                                <label>
                                    <input class="pgm-lang-input" type="radio" name="pgm-lang" value="2">
                                    <span class="select-lang">C</span>
                                </label>
                                <label>
                                    <input class="pgm-lang-input" type="radio" name="pgm-lang" value="3">
                                    <span class="select-lang">C++</span>
                                </label>
                                <label>
                                    <input class="pgm-lang-input" type="radio" name="pgm-lang" value="4">
                                    <span class="select-lang">Pyhton</span>
                                </label>
                            </div>
                        </div>
                    </button>
                    <!-- <label id="pgm-lang">PHP
                        <span>Hypertext Preprocessor</span>
                    </label> -->
                </div>
            </div>
        </div>

        <div class="main">
            <div class="side-nav-bar border">
                <label>PHP echo </label>
                <label>PHP Variables</label>
                <label>PHP If...Else...ElseIf..</label>
                <label>PHP Switch </label>
                <label>PHP Loops </label>
                <label>PHP Functions </label>
                <label>PHP Arrays</label>
                <label>PHP RegEx</label>
                <label>PHP Date and Time</label>
                <label>PHP foreach</label>
                <label>PHP JSON</label>
                <label>PHP File Handling</label>
                <label>PHP OOP class </label>
                <label>PHP echo </label>
                <label>PHP Variables</label>
                <label>PHP If...Else...ElseIf..</label>
                <label>PHP Switch </label>
                <label>PHP Loops </label>
                <label>PHP Functions </label>
                <label>PHP Arrays</label>
                <label>PHP RegEx</label>
                <label>PHP Date and Time</label>
                <label>PHP foreach</label>
                <label>PHP JSON</label>
                <label>PHP File Handling</label>
                <label>PHP OOP class </label>

            </div>
            <div class="code">
                <textarea  class="editable border" id="user-code" placeholder="Type your code here...">
                </textarea>
            </div>
        </div>

        <div class="output">
            <div class="code-output">
                <label>Program output : </label>
                <div id="code-response">
                    Hello World
                </div>
            </div>
        </div>
    </div>
    <div class="overlay">
        <div>
            <i class="fas fa-sync-alt fa-spin"></i> Running...
        </div>
    </div>
    <div class="dropdown-overlay"></div>

    <!-- Code with explanation -->
    <div class="explanation">
        <div class="code-exp">
            <label for="">Date and Time {PHP}</label>
            <div class="pgm border">
            date_default_timezone_set('Asia/Kolkata'); <span class="comment">// set timezone</span>
            <br/>
            echo time(); <span class="comment">// returns the current time in the number of seconds since the Unix Epoch (January 1 1970 00:00:00 GMT).</span>
            <br/>
            $date_obj = new DateTime(time()); <span class="comment">// DateTime class constructor</span>
            <br/>
            echo $date_obj->format('U');  <span class="comment">// U for Unix Epoch</span>
            <br/>
            echo "\n";
            <br/>
            echo $date_obj->format('d-m-Y');  <span class="comment">// format date-month-year</span>
            </div>
        </div>
    </div>

    
    <div class="explanation">
        <div class="code-exp">
            <label for="">foreach loop {PHP}</label>
            <div class="pgm border">
                $fruits = array('Apple', 'Mango', 'Banana', 'Orange', 'Pineapple', 'Grapes');
                <br/>
                foreach($fruits as $fruit_name){
                <br/>
                    echo $fruit_name;
                <br/>
                    echo "\n";
                <br/>
                }
                <br/>

                echo "\n";
                <br/>

                // with key
                <br/>
                foreach($fruits as $index => $fruit_name){
                <br/>
                    echo $index;
                <br/>
                    echo "=>";
                <br/>
                    echo $fruit_name;
                <br/>
                    echo "\n";
                <br/>
                }

            </div>
        </div>
    </div>
    <script>
        let pgmInputs = document.getElementsByClassName('pgm-lang-input')
        let dropDown = document.getElementsByClassName('drop-down')[0]
        let lang = ['PHP', 'C', 'C++', 'Python']
        document.getElementById('lang-name').addEventListener('click', () => {
                    dropDown.style.display = 'block'
                    $('.dropdown-overlay').toggle()
        })
        function chooseLanguage(){
            for(i=0; i<pgmInputs.length; i++){
                if(pgmInputs[i].checked){
                    langName = pgmInputs[i].value
                    console.log(langName)
                    if(langName == 1)
                        php_code()
                    if(langName == 2)
                        c_code()
                    if(langName == 3)
                        cpp_code()
                    if(langName == 4)
                        python_code()
                    document.getElementById('lang-name').innerHTML = 'Language : '+lang[i]
                    dropDown.style.display = 'none'
                    $('.dropdown-overlay').toggle()
                    return
                }
            }
        }
        $('.pgm-lang-input').click(() => {
            chooseLanguage()
        })
    </script>
    

    <script>
        $('#run-code-btn').click(() => {
            document.getElementById('error-btn').style.display = 'none'
            document.getElementById('success-btn').style.display = 'none'
            document.getElementById('raw-code-link').style.display = 'none'
            let userCode = $('#user-code').val()
            let pgmLangInputs = document.getElementsByName('pgm-lang')
            let langName = 1
            let runBtn = document.getElementById('run-code-btn')
            runBtn.disabled = true
            runBtn.innerHTML = '<i class="fas fa-sync-alt fa-spin" style="margin-right:5px;" ></i> Running...'
            for(i=0; i<pgmLangInputs.length; i++){
                if(pgmLangInputs[i].checked){
                    langName = pgmLangInputs[i].value
                    break
                }
            }
            console.log(langName)
            let reqObj = {
                userCode,
                langName
            }
            let url = 'run-user-code.php'
            //$('.overlay').toggle()
            setTimeout(() => {
                $('#code-response').load(url, reqObj)
            }, 1500);
        })
        var textareas = document.getElementsByTagName('textarea');
        var count = textareas.length;
        for(var i=0;i<count;i++){
            textareas[i].onkeydown = function(e){
                if(e.keyCode==9 || e.which==9){
                    e.preventDefault();
                    var s = this.selectionStart;
                    this.value = this.value.substring(0,this.selectionStart) + "\t" + this.value.substring(this.selectionEnd);
                    this.selectionEnd = s+1; 
                }
            }
        }

        function php_code(){
            let el = document.getElementById('user-code')
            el.innerHTML = '\<?php\n\n'
            el.innerHTML += '\t// Write your code here...\n\n'
            el.innerHTML += '\techo "Hello World";\n'
            el.innerHTML += '\n?>'
        }
        php_code()
        function c_code(){
            let el = document.getElementById('user-code')
            el.innerHTML = '// Write your code here...\n\n'
            el.innerHTML += '#include <stdio.h>\n\n'
            el.innerHTML += 'int main(){\n\n'
            el.innerHTML += '\tprintf("Hello World");\n\n'
            el.innerHTML += '\treturn 0;\n'
            el.innerHTML += '\n}'
        }
        function cpp_code(){
            let el = document.getElementById('user-code')
            el.innerHTML = '// Write your code here...\n\n'
            el.innerHTML += '#include <iostream>\n\n'
            el.innerHTML += 'using namespace std;\n\n'
            el.innerHTML += 'int main(){\n\n'
            el.innerHTML += '\tcout << "Hello World";\n\n'
            el.innerHTML += '\treturn 0;\n'
            el.innerHTML += '\n}'
        }
        function python_code(){
            let el = document.getElementById('user-code')
            el.innerHTML = '# Write your code here...\n\n'
            el.innerHTML += 'print("Hello World")\n\n'
        }
    </script>
    <script src="public/script/index.js"></script>
    <script>
        $('.dropdown-overlay').click(() => {
            $('.dropdown-overlay').toggle()
            $('.drop-down').toggle()
        })
    </script>
</body>
</html>