<?php
$mensagem = '';
if (isset($_GET['status'])) {
    switch ($_GET['status']) {
        case 'success':
            $mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
            break;
        case 'error':
            $mensagem = '<div class="alert alert-danger">Ação não executada!</div>';
            break;
        default:
         
            break;
    }
}
?>

<?php if ($mensagem != '') { ?>
    <section>
        <?php echo $mensagem; ?>
    </section>
<?php } ?>

</script>
<section>
    <form method="get">
        <div class="row">
            <div class="col">
                <label>Filtrar</label>
                <select class="form-control" name="filtro" id="filtro" value="">
                    <?php foreach ($listaVaga as $key => $value) { ?>
                        <option value="<?php echo $value->id; ?>" <?php echo $obVaga->id == $value->id ? "selected" : ''; ?>> <?php echo $value->id; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </form>
</section>
<script>
    //Filtro -----inicio//
    $('#filtro').change(function() {
        var filter = $(this).val();
        filterList(filter);
    });
    function filterList(value) {
        var list = $(".cards .card");
        $(list).hide();
        if (value == "0") {
            $(".cards").find(".card").each(function(i) {
                $(this).show();
            });
        } else {
            $(".cards").find(".card[data-custom-type*=" + value + "]").each(function(i) {
                $(this).show();
            });
        }
    }
    //filtro ----- final//
</script>
<section>
    <a href="cadastrar">
        <button class="btn btn-success mt-3">Cadastrar</button>
    </a>

    <?php if (count($vagas) == 0) { ?>
        <div class="alert alert-secondary mt-3">Nenhuma vaga encontrada</div>
    <?php } else { ?>
        <?php foreach ($vagas as $key => $value) { ?>
            <section class="cards">
                <div class="card text-dark mt-3" data-custom-type="<?php echo $value->id; ?>" id="table-listagem">
                    <h5 class="card-header"><?php echo $value->titulo; ?></h5>
                    <div class="card-body" id="myTable">
                        <h5 class="card-title">Id:<?php echo $value->id; ?></h5>
                        <p class="card-text">Descrição<?php echo $value->descricao; ?><br>
                            Data:<?php echo $value->data; ?><br>
                            Status:<?php echo ($value->status == 's' ? 'Ativo' : 'Inativo'); ?><br>
                        </p>
                        <td>
                            <a href="editar.php?id=<?php echo $value->id; ?>">
                                <button type="button" class="btn btn-primary">Editar</button>
                            </a>

                            <a href="excluir.php?id=<?php echo $value->id; ?>">
                                <button type="button" class="btn btn-danger">Excluir</button>
                            </a>
                        </td>
                    </div>
                </div>
            </section>
        <?php } ?>
    <?php } ?>
</section>