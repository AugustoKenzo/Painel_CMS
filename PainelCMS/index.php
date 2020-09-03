<?php
  try {
    $pdo = new PDO('mysql:host=localhost;dbname=painel_cms;','root','');
  } catch (PDOException $e) {
    echo "Falhou: ".$e->getMessage();
  }

  $sobre = $pdo->prepare("SELECT * FROM `tb_sobre`");
  $sobre->execute();

  $sobre = $sobre->fetch()['sobre'];
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/style.css">
        <script src="js/jquery-3.5.1.js"></script>
        <title>Painel CMS</title>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">Painel de Controle</a>
                <button class="navbar-toggler navbar-toggle" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsExample07">
                <ul id="menu-principal" class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#" ref_sys="sobre">Editar Sobre <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" ref_sys="cadastrar_equipe">Cadastrar Equipe</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" ref_sys="lista_equipe">Lista Equipe</a>
                    </li>
                </ul>
                <ul class="my-2 my-md-0 navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-door-closed" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2zm1 13h8V2H4v13z"/>
                        <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0z"/>
                        </svg> Sair</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>

        <div class="box" style="position: relative; top:50px;">
        <header id="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <h2> <svg width="0.8em" height="0.8em" viewBox="0 0 16 16" class="bi bi-gear-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 0 0-5.86 2.929 2.929 0 0 0 0 5.858z"/>
                        </svg> Painel de Controle
                        </h2>
                    </div>

                    <div class="col-md-3">
                        <p><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-clock" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm8-7A8 8 0 1 1 0 8a8 8 0 0 1 16 0z"/>
                        <path fill-rule="evenodd" d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
                        </svg> Seu último login foi em: 12/09/2020</p>
                    </div>
                </div>
            </div><!--cointaner-->
        </header>

        <section class="bread">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Home</li>
                    </ol>
                </nav>
            </div>
        </section>

        <section class="principal">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action active cor-padrao" ref_sys="sobre"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                            </svg> Editar Sobre</a>
                            <a href="#" class="list-group-item list-group-item-action" ref_sys="cadastrar_equipe"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                            </svg> Cadastrar Equipe</a>
                            <a href="#" class="list-group-item list-group-item-action" ref_sys="lista_equipe"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-list-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3.854 2.146a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 3.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 7.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
                            </svg> Lista Equipe</a> 
                        </div>
                    </div>

                    <div class="col-md-9">
                        <?php
                            if(isset($_POST['editar_sobre'])){
                                $sobre = $_POST['sobre'];
                                $pdo->exec("DELETE FROM `tb_sobre`");
                                $sql = $pdo->prepare("INSERT INTO `tb_sobre` VALUES(NULL,?)");
                                $sql->execute(array($sobre));
                                echo '<div class="alert alert-success" role="alert">
                                        O código HTML <b>Sobre</b> foi editado com sucesso!
                                    </div>';
                                $sobre = $pdo->prepare("SELECT * FROM `tb_sobre`");
                                $sobre->execute();
                                
                                $sobre = $sobre->fetch()['sobre'];
                            }elseif(isset($_POST['cadastrar_equipe'])){
                                $nome = $_POST['nome_membro'];
                                $descricao = $_POST['descricao'];
                                $sql = $pdo->prepare("INSERT INTO `tb_equipe` VALUES(NULL,?,?)");
                                $sql->execute(array($nome,$descricao));
                                echo '<div class="alert alert-success" role="alert">
                                        O membro da equipe foi cadastrado com sucesso!
                                    </div>';
                                
                            }
                        ?>
                        <div id="sobre_section" class="card">
                            <div class="card-header cor-padrao">
                                Sobre
                            </div>
                            <div class="card-body">
                                <form method="post">
                                    <div class="form-group">
                                        <label>Código HTML:</label>
                                        <textarea name="sobre" style="height: 140px;" class="form-control"><?php echo $sobre;?></textarea>
                                    </div>
                                    <input type="hidden" name="editar_sobre" value="">
                                    <button type="submit" name="acao" class="btn cor-padrao">Enviar</button>
                                </form>
                            </div>
                        </div>

                        <div id="cadastrar_equipe_section" class="card">
                            <div class="card-header cor-padrao">
                                Cadastrar Equipe
                            </div>
                            <div class="card-body">
                                <form method="POST">
                                    <div class="form-group">
                                        <label>Nome do membro:</label>
                                        <input type="text" name="nome_membro" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Descrição do membro:</label>
                                        <textarea style="height: 140px;" name="descricao" class="form-control"></textarea>
                                    </div>
                                    <input type="hidden" name=cadastrar_equipe>
                                    <button type="submit" class="btn cor-padrao">Cadastrar</button>
                                </form>
                            </div>
                        </div>

                        <div id="lista_equipe_section" class="card">
                            <div class="card-header cor-padrao">
                                Membros da Equipe:
                            </div>
                            <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">ID:</th>
                                    <th scope="col">Nome do membro:</th>
                                    <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sql = $pdo->prepare("SELECT * FROM `tb_equipe`");
                                        $sql->execute();

                                        $sql = $sql->fetchAll();
                                        foreach ($sql as $key => $value) {
                                        
                                    ?>
                                    <tr>
                                        <td><?php echo $value['id'];?></td>
                                        <td><?php echo $value['nome'];?></td>
                                        <td><button id_membro="<?php echo $value['id']?>" type="button" class="btn btn-danger deletar-membro"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg> Excluir</button></td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </div><!--box-->

        <script type="text/javascript">
            $(function(){
              cliqueMenu();
              scrollItem();
                function cliqueMenu(){
                    $('#menu-principal a, .list-group a').click(function(){
                        $('.list-group a').removeClass('active').removeClass('cor-padrao')
                        $('#menu-principal a').parent().removeClass('active')
                        $('#menu-principal a[ref_sys='+$(this).attr('ref_sys')+']').parent().addClass('active')
                        $('.list-group a[ref_sys='+$(this).attr('ref_sys')+']').addClass('active').addClass('cor-padrao')
                        return false;
                    })
                }

                function scrollItem(){
                    $('#menu-principal a, .list-group a').click(function(){
                        var ref ='#'+$(this).attr('ref_sys')+'_section';
                        var offset = $(ref).offset().top;
                        $('html,body').animate({'scrollTop':offset-55});
                        if($(window)[0].innerWidth <= 991){
                            $('.navbar-toggler-icon').click();
                        }
                    });
                }

                $('button.deletar-membro').click(function(){
                    var id_membro = $(this).attr('id_membro')
                    del = $(this).parent().parent();
                    $.ajax({
                        method:'post',
                        data:{'id_membro':id_membro},
                        url:'deletar.php'
                    }).done(function(){
                        del.fadeOut(function(){
                        del.remove();
                    });
                    })
                    
                })

                
            })
        </script>
    </body>
</html>