<?php

include '../bd/conecta.php';

$id_usuario = $_POST['id_usuario'];
                            
            $sql = "SELECT 
                        id
                        , nome
                        , usuario
                        , senha
                        ,flag
                        ,case flag
                           when 0 then 'Usuario Padrao'
                           when 1 then 'Usuario Administrador'
                        end as nivel
                    FROM 
                        gtc_usuario 
                    WHERE 
                        id = '$id_usuario'";
    
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                echo '<div class="form-group">
                        <label>Código:</label>
                        <input type="text" class="form-control" id="user_id" disabled value="'.$row['id'].'">
                    </div>';
                echo '<div class="form-group">
                        <label>Nome Completo:</label>
                        <input type="text" class="form-control" id="user_nome" value="'.$row['nome'].'">
                    </div>';
                echo '<div class="form-group">
                        <label>Usuario:</label>
                        <input type="text" class="form-control" id="user_usuaeio" disabled value="'.$row['usuario'].'">
                    </div>';
                echo '<div class="form-group">
                        <label>Senha:</label>
                        <input type="text" class="form-control" id="user_senha" value="'.$row['senha'].'">
                    </div>';
                ?>
                <div class="form-group">
                    <label for="nome">Nivel:</label>
                        <select id="user_nivel" class="selectpicker form-control show-tick">
                                <option value="<?php echo $row['flag']?>"><?php echo $row['nivel']?></option>
                                <option value="0">Usuario Padrao...</option>
                                <option value="1">Usuario Administrador...</option>
                        </select>
                </div>
                <div class="form-group">
                    <button id="btnUpdateUser" type="button" class="btn btn-primary">Atualizar Usuario</button>
                </div>
                <?php
                } 
            }
        ?> 
<script>
    $("#btnUpdateUser").click(function(){
            var user_nome = $('#user_nome').val();
            var user_senha = $('#user_senha').val();
            console.log('user nome' + user_nome);
            console.log('user senha'+ user_senha);
			$.ajax({
				type:'post',
				url:'./valida/at_cad_usuario.php',
				data:{
                    'user_id':$('#id_usuario').val(),
					'user_nome':$('#user_nome').val(),
                    'user_usuario':$('#user_usuario').val(),
					'user_senha':$('#user_senha').val(),
                    'user_nivel':$('#user_nivel').val()
                },
				timeout: '10000',
               statusCode:{
                   200: function(){
                        $('#div_retorno_update').load('./pages/cadastroUSER/pag-upt-success.php');
                    },
                   402: function(){
                       $('#div_retorno_update').load('./pages/cadastroUSER/pag-upt-info.php');
                   }
               }
            });
        });
</script> 