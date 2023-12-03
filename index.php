<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="indexStyle.css">
    <title>Document</title>
</head>

<body>
    <!-- Adding two numbers -->
    <div class="container">
        <div class="container-box">
            <form action="" method="post" id="act-1">
                <input type="number" name="num1" value="0"  placeholder="0">
                <input type="number" name="num2" value="0"  placeholder="0">
                <div class="button-result">
                <button type="submit" name="solve" class="btn bg-primary mt-3">Solve</button>
                </div>
            </form>
            <div>
                <?php 
                if (isset($_POST['solve'])) ?> <?php { 
                    $array = array('key1' => 'num1', 'key2' => 'num2');
                    if (array_key_exists('key1', $array))  
                     ?>
                     <?php  { 
                        if(!$_POST['num1'] || is_null($_POST[$_POST['num1']])) {  ?> 
                            <script>
                                let numSum = <?php echo $_POST['num2']; ?> 
                                alert(numSum);
                            </script>
                   <?php } else if(!$_POST['num2'] || is_null($_POST['num2'])) {
                        $num2 = $_POST['num1'];
                        echo $num2;
                   }
                    }  
               } ?>
            </div>
        </div>
    </div>
    <!-- Click Me Activity -->
    <div class="container">
        <div class="container-box" id="act-2">
            <button  onclick="Counter()">Click Me</button>
            <button  onclick="Reset()">Reset</button>
            <div class="display">
                <p id="display_count"></p>
            </div>
            <div class="solution">
                <script>
                    let count = parseInt(localStorage.getItem('clickCount') || 0);
                    document.getElementById('display_count').innerHTML = count;

                    function Counter() {
                        count++;
                        document.getElementById('display_count').innerHTML = count ;
                        localStorage.setItem('clickCount', count);
                    }

                    function Reset() {
                        localStorage.clear();
                    }
                </script>
            </div>
        </div>

    </div>
    <div class="container">
        <div class="container-box act-3">
            <form action="" method="post" id="act-3">
                <input type="number" name="loop"  id="loop1" placeholder="number of loop">
                <button type="submit" name="click_display" >Loop</button>
            </form>
            <div class="picture-wrap">
            <div id='loop_result'></div>
            </div>
            
            <?php if (isset($_POST['click_display'])) { ?>
                <?php $display_loop =  $_POST['loop']; ?>

                <script>
                    var number_loop = <?php echo $_POST['loop'] ?>;
                    var loop = '';
                    for (i = 0; i < number_loop; i++) {
                        loop += '<img src="./assets/logo.png" alt="logo">;'
                    }
                    document.getElementById('loop_result').innerHTML = loop;
                </script>
            <?php } ?>
        </div>
    </div>
</body>

</html>