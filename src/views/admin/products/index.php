<?php require_once(__DIR__."/../../header.php"); ?>

    <div class="container pt-5">
        <div class="card">
            <div class="card-header bg-secondary text-white font-weight-bold text-uppercase">
                Importação de dados Excel
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-sm">
                            <div class="input-group mb-3 p-3">
                                <form action="http://localhost/import-excel-php/public/products/import" method="post" enctype="multipart/form-data">    
                                    <div class="input-group mb-3">
                                        <input type="file" name="worksheet" class="form-control" accept=".xls,.xlsx">
                                        <button class="btn btn-outline-secondary btn-info" type="submit">Importar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        <div class="col-sm">
                            <div class="mb-3 p-3 float-right">
                                <button type="button" class="btn btn-danger float-right" style="float: right;">Logout</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row gx-5">
                        <div class="col">
                            <table class="table table-bordered table-striped text-center">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">AÇÃO</th>
                                        <th scope="col">EAN</th>
                                        <th scope="col">NOME PRODUTO</th>
                                        <th scope="col">PREÇO</th>
                                        <th scope="col">ESTOQUE</th>
                                        <th scope="col">DATA FABRICAÇÃO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($products as $product): ?>
                                        <tr>
                                            <td><a href="http://localhost/import-excel-php/public/products/delete/<?= $product['ean']?>" class="btn btn-outline-secondary">Remover</a></td>
                                            <td><?= $product['ean'] ?></td>
                                            <td><?= $product['product_name'] ?></td>
                                            <td><?= "R$".number_format($product['price'], 2, ',', '') ?></td>
                                            <td><?= $product['inventory'] ?></td>
                                            <td><?= date_format( date_create($product['date_fabrication']),"d/m/Y") ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once(__DIR__."/../../footer.php"); ?>