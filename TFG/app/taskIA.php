<?php

if(isset($_GET["taskName"])){
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://api.openai.com/v1/chat/completions',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>'{
        "model": "gpt-3.5-turbo",
        "messages": [
            {
                "role": "user",
                "content": "Crea una descripción con pocas palabras para realizar una tarea según lo siguiente: '.$_GET["taskName"].'"
            }
        ],
        "max_tokens": 512,
        "top_p": 1,
        "temperature": 0.5,
        "frequency_penalty": 0,
        "presence_penalty": 0
    }',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Authorization: Bearer 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'
      ),
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    
    $json = json_decode($response,true);
    
    $respuesta = $json['choices'][0]['message']['content'];

}


?>
<div id="taskForm">
    <div class="appInfo">
        <h2>Nueva tarea</h2>
        <p>05 Apr 2023, Wednesday</p>
    </div>
    <div class="appContainer">
        <div id="taskFormContainer">
            <div class="container">
                <h2 id="taskFormContainer-title">Tarea con IA 🤖</h2><br>
                <form action="./index.php" method="get">
                    <input type="hidden" name="taskType" id="tipoTarea" value="otro">
                    <?php
                    if (!isset($_GET["completar"])) {
                        echo '<input type="hidden" name="w" value="taskIA">';
                    }
                    ?>
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" name="taskName" required class="form-control" id="floatingInputNombre" value="<?php if(isset($_GET["taskName"])){echo $_GET["taskName"];}?>">
                                <label for="floatingInputGrid">Nombre de la tarea</label>
                            </div>
                        </div>
                    </div><br><br>
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating">
                                <input <?php if(!isset($respuesta)){echo "disabled";}?> type="text" name="taskDesc" required class="form-control" id="floatingInputDesc" value="<?php if(isset($respuesta)){echo $respuesta;}?>">
                                <label for="floatingInputGrid">Descripción</label>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="date" name="taskDateStart" required class="form-control" id="floatingInputGrid" min="<?php echo date('Y-m-d'); ?>" value="<?php if(isset($_GET["taskDateStart"])){echo $_GET["taskDateStart"];}?>">
                                <label for="floatingInputGrid">Fecha de inicio</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="date" name="taskDateEnd" required class="form-control" id="floatingInputGrid" min="<?php echo date('Y-m-d'); ?>" value="<?php if(isset($_GET["taskDateEnd"])){echo $_GET["taskDateEnd"];}?>">
                                <label for="floatingInputGrid">Fecha de fin</label>
                            </div>
                        </div>
                    </div><br><br>
                    <div class="row">
                        <?php
                        if (isset($_GET["completar"])) {
                            echo '<input type="submit" class="btn btn-principal" style="margin-bottom: 20px;" value="Crear tarea">';
                        }else {
                           echo '<input type="submit" class="btn btn-principal" style="margin-bottom: 20px;" name="completar" value="Completar descripción">';
                        }


                        ?>
                        <button class="btn btn-secundario" id="btnVolverTask">Volver</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>