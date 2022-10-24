<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--================== FAVICON ========================-->
    <link rel="shortcut icon" href="img/bot.png" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!--================== CSS ========================-->  
    <link rel="stylesheet" href="bot.css">
    <title>Simple | Chatbot</title>
</head>
<body>
    
    <div id="bot">
        <div id="con1"></div>
        <div id="con2"></div>
        <div id="container">
            <div id="header">
                Online Chatbot App
            </div>

            <div id="body">
                <!-- This section will be dynamically inserted from JavaScript -->
                <!--<div class="userSection">
                    <div class="messages user-message">

                    </div>
                    <div class="seperator"></div>
                </div>

                <div class="botSection">
                    <div class="messages bot-reply">

                    </div>
                    <div class="seperator"></div>
                </div>   -->             
            </div>

            <!-- messages input field -->
            <div id="inputArea">
                <input type="text" name="messages" id="userInput" placeholder="Enter your message here..." required>
                <input type="submit" id="send" value="Send" name="send">
            </div>
        </div>
    </div>    

    <script type="text/javascript">

        $(document).ready(function(){

            $("#userInput").on("keyup",function(){

                if($("#userInput").val()){
                    $("#send").css("display","block");
                }else{
                    $("#send").css("display","none");
                }
            });
        });

            $("#send").on("click", function(){
                $value = $("#userInput").val();
                $msg = '<div class="userSection">'+'<div class="messages user-message">'+ $value +'</div>'+'<div class="seperator"></div>'+'</div>';
                $("#body").append($msg);
                
                // start ajax code
                $.ajax({
                    url: 'query.php',
                    type: 'POST',
                    data: 'messageValue='+$value,
                    success: function(result){
                        $replay = '<div class="botSection">'+'<div class="messages bot-reply">'+ result +'</div>'+'<div class="seperator"></div>'+'</div>';
                        $("#body").append($replay);
                        // when chat goes down the scroll bar automatically comes to the bottom
                        $("#body").scrollTop($("#body")[0].scrollHeight);
                    }
                });
                $("#userInput").val("");
                $("#send").css("display","none");
            });
    </script>
</body>
</html>