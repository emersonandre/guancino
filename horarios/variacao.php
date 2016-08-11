<?php

include 'conecta.php';

$id_linha = $_POST['id_linha'];


?>

<select id="busca_variacao" class="selectpicker form-control show-tick">
    <option value="">Selecione a Variação...</option>
        <?php                              
            $sql = "SELECT 
                        id
                        ,nome
                    FROM 
                        gtc_linhas_variacao
                    WHERE 
                        id_linha='$id_linha'
                ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                echo '<option value="'.$row['id'].'">'.$row['nome'].'</option>';
                } 
            }
        ?>
</select>
<script>
          $('#busca_variacao').change(function(){
            var id_variacao = $('#busca_variacao').val();
            var busca_linha = $('#busca_linha').val();
            console.log(busca_linha);
            console.log(id_variacao);
            $.ajax({
		      type:'post',
		      url: './horarios/CarregaHorario.php',
		      data: {
                  'id_variacao':id_variacao,
                  'busca_linha':busca_linha
              },
              erro: function(){
                  alert('erro');
              },
		      success: function(data){
		          $("#divCarregaHorarios").html(data);
		      }

		    });
        });
    </script>