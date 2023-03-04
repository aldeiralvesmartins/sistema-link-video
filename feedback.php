<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rating1 = isset($_POST['rating1']) ? $_POST['rating1'] : null;
    $rating2 = isset($_POST['rating2']) ? $_POST['rating2'] : null;
    $rating3 = isset($_POST['rating3']) ? $_POST['rating3'] : null;
    $comment = isset($_POST['comment']) ? $_POST['comment'] : null;
    
    if (($rating1 != null) && ($rating2 != null) && ($rating3 != null) || ($comment != null)) {
        $_SESSION['avaliou'] = true; // define o flag da sessão como true
        header('Location: feedback.php?show_toast=true');
        exit();
    } else {
        header('Location: feedback.php');
        exit();
    }
}

// verifica se a pessoa já avaliou
if (isset($_SESSION['avaliou']) && $_SESSION['avaliou'] === true) {
    echo 'Você já avaliou.';
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>Feedback</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/assets/img/favicon.ico" rel="icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
<div class="row navbar fixed-top" style="background-color: rgb(37,188,156);color: white;">
    <h4 class="text-center" style="text-justify: auto;">Estamos prontos para te ajudar</h4>
</div>
<br><br><br><br>
<div class="container">
    <div class="text-center">
        <form method="POST">
            <h5 for="rating-1" class="form-label">1. Como você avalia a cordialidade e atenção recebida neste
                atendimento?</h5>

            <div class="rating">
                <input type="radio" value="5" name="rating1" id="rating-5">
                <label for="rating-5"></label>
                <input type="radio" value="4" name="rating1" id="rating-4">
                <label for="rating-4"></label>
                <input type="radio" value="3" name="rating1" id="rating-3">
                <label for="rating-3"></label>
                <input type="radio" value="2" name="rating1" id="rating-2">
                <label for="rating-2"></label>
                <input type="radio" value="1" name="rating1" id="rating-1">
                <label for="rating-1"></label>
                <div class="emoji-wrapper">
                    <div class="emoji">
                    <img class="rating-0" src="rating-0.svg" alt="emoji neutro">
                    <img class="rating-1" src="rating-1.svg" alt="emoji insatisfeito">
                    <img class="rating-2" src="rating-2.svg" alt="emoji pouco satisfeito">
                    <img class="rating-3" src="rating-3.svg" alt="emoji tranquilo">
                    <img class="rating-4" src="rating-4.svg" alt="emoji feliz">
                    <img class="rating-5" src="rating-5.svg" alt="emoji muito feliz">
                    </div>
                </div>
            </div>
            <br>
            <h5 for="rating-2" class="form-label">2. Como você avalia a solução dada à sua necessidade?</h5>
            <div class="rating">
                <input type="radio" value="5" name="rating2" id="rating-10">
                <label for="rating-10"></label>
                <input type="radio" value="4" name="rating2" id="rating-9">
                <label for="rating-9"></label>
                <input type="radio" value="3" name="rating2" id="rating-8">
                <label for="rating-8"></label>
                <input type="radio" value="2" name="rating2" id="rating-7">
                <label for="rating-7"></label>
                <input type="radio" value="1" name="rating2" id="rating-6">
                <label for="rating-6"></label>
                <div class="emoji-wrapper">
                    <div class="emoji">
                    <img class="rating-0" src="rating-0.svg" alt="emoji neutro">
                    <img class="rating-6" src="rating-1.svg" alt="emoji insatisfeito">
                    <img class="rating-7" src="rating-2.svg" alt="emoji pouco satisfeito">
                    <img class="rating-8" src="rating-3.svg" alt="emoji tranquilo">
                    <img class="rating-9" src="rating-4.svg" alt="emoji feliz">
                    <img class="rating-10" src="rating-5.svg" alt="emoji muito feliz">
                    </div>
                </div>
            </div>
            <br>
            <h5 for="rating-3" class="form-label">3. Como você avalia os produtos e serviços da R2soft?</h5>
            <div class="rating">
                <input type="radio" value="5" name="rating3" id="rating-15">
                <label for="rating-15"></label>
                <input type="radio" value="4" name="rating3" id="rating-14">
                <label for="rating-14"></label>
                <input type="radio" value="3" name="rating3" id="rating-13">
                <label for="rating-13"></label>
                <input type="radio" value="2" name="rating3" id="rating-12">
                <label for="rating-12"></label>
                <input type="radio" value="1" name="rating3" id="rating-11">
                <label for="rating-11"></label>
                <div class="emoji-wrapper">
                    <div class="emoji">
                    <img class="rating-0" src="rating-0.svg" alt="emoji neutro">
                    <img class="rating-11" src="rating-1.svg" alt="emoji insatisfeito">
                    <img class="rating-12" src="rating-2.svg" alt="emoji pouco satisfeito">
                    <img class="rating-13" src="rating-3.svg" alt="emoji tranquilo">
                    <img class="rating-14" src="rating-4.svg" alt="emoji feliz">
                    <img class="rating-15" src="rating-5.svg" alt="emoji muito feliz">
                    </div>
                </div>
            </div>
            <br>
            <div class="mb-3">
                <h5 for="comment" class="form-label">Fique à vontade para deixar seu comentário:</h5>
                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
            </div>
            <input type="submit" value="Enviar" class="btn btn-primary" style="width: 20%;">
        </form>
    </div>
</div>
<!-- TOAST -->
<div class="toast position-fixed end-0" id="successToast" role="alert" aria-live="assertive" aria-atomic="true"
     data-bs-autohide="true" data-bs-delay="3000" style="top: 45px;">
    <div class="toast-header">
        <strong class="me-auto">Feedback</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Fechar"></button>
    </div>
    <div class="toast-body">
        Obrigado pelo seu feedback!
    </div>
</div>
<div class="toast position-fixed end-0" id="Toast" role="alert" aria-live="assertive" aria-atomic="true"
     data-bs-autohide="true" data-bs-delay="3000" style="top: 45px;">
    <div class="toast-header">
        <strong class="me-auto">Feedback</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Fechar"></button>
    </div>
    <div class="toast-body">
        De sua opinião:
    </div>
</div>
<!-- CÓDIGO JAVASCRIPT PARA EXIBIÇÃO DO TOAST -->
<script>
    $(document).ready(function () {
        <?php if (empty($_GET['show_toast'])){?>
        $('#Toast').toast('show');
        <?php }else{ ?>
        $('#successToast').toast('show');
        <?php } ?>
    });
</script>
</body>
</html>
<style>

    .container {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .rating {
        display: flex;
        width: 100%;
        justify-content: center;
        overflow: hidden;
        flex-direction: row-reverse;
        height: 150px;
        position: relative;
    }

    .rating-0 {
        filter: grayscale(100%);
    }

    .rating > input {
        display: none;
    }

    .rating > label {
        cursor: pointer;
        width: 40px;
        height: 40px;
        margin-top: auto;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23e3e3e3' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: center;
        background-size: 76%;
        transition: .3s;
    }

    .rating > input:checked ~ label,
    .rating > input:checked ~ label ~ label {
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23fcd93a' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
    }

    .rating > input:not(:checked) ~ label:hover,
    .rating > input:not(:checked) ~ label:hover ~ label {
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23d8b11e' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
    }

    .emoji-wrapper {
        width: 100%;
        text-align: center;
        height: 100px;
        overflow: hidden;
        position: absolute;
        top: 0;
        left: 0;
    }

    .emoji-wrapper:before,
    .emoji-wrapper:after {
        content: "";
        height: 15px;
        width: 100%;
        position: absolute;
        left: 0;
        z-index: 1;
    }

    .emoji-wrapper:before {
        top: 0;
        background: linear-gradient(to bottom, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 1) 35%, rgba(255, 255, 255, 0) 100%);
    }

    .emoji-wrapper:after {
        bottom: 0;
        background: linear-gradient(to top, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 1) 35%, rgba(255, 255, 255, 0) 100%);
    }

    .emoji {
        display: flex;
        flex-direction: column;
        align-items: center;
        transition: .3s;
    } 
     .emoji > img {
        margin: 15px 0;
        width: 70px;
        height: 70px;
        flex-shrink: 0;
    }

    #rating-1:checked ~ .emoji-wrapper > .emoji {
        transform: translateY(-100px);
    }

    #rating-2:checked ~ .emoji-wrapper > .emoji {
        transform: translateY(-200px);
    }

    #rating-3:checked ~ .emoji-wrapper > .emoji {
        transform: translateY(-300px);
    }

    #rating-4:checked ~ .emoji-wrapper > .emoji {
        transform: translateY(-400px);
    }

    #rating-5:checked ~ .emoji-wrapper > .emoji {
        transform: translateY(-500px);
    }

    #rating-6:checked ~ .emoji-wrapper > .emoji {
        transform: translateY(-100px);
    }

    #rating-7:checked ~ .emoji-wrapper > .emoji {
        transform: translateY(-200px);
    }

    #rating-8:checked ~ .emoji-wrapper > .emoji {
        transform: translateY(-300px);
    }

    #rating-9:checked ~ .emoji-wrapper > .emoji {
        transform: translateY(-400px);
    }

    #rating-10:checked ~ .emoji-wrapper > .emoji {
        transform: translateY(-500px);
    }

    #rating-11:checked ~ .emoji-wrapper > .emoji {
        transform: translateY(-100px);
    }

    #rating-12:checked ~ .emoji-wrapper > .emoji {
        transform: translateY(-200px);
    }

    #rating-13:checked ~ .emoji-wrapper > .emoji {
        transform: translateY(-300px);
    }

    #rating-14:checked ~ .emoji-wrapper > .emoji {
        transform: translateY(-400px);
    }

    #rating-15:checked ~ .emoji-wrapper > .emoji {
        transform: translateY(-500px);
    }
</style>


