<?php $bbdd = new BBDD(); ?>
<section>
    <div class="container py-3">
        <div class="row">
            <div class="col-12 text-center">
                <h1>ADD MONEY</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form>
                    <div class="form-group form-check">
                        <input type="text" name="user" class="form-control" id="inputUser" required>
                        <label class="form-check-label" for="inputUser">Your username</label>
                    </div>
                    <div class="form-group form-check">
                        <input type="number" class="form-control" id="inputSaldo" min="10" max="20" step="0.01" name="money" required>
                        <label class="form-check-label" for="inputSaldo">How much do you want to add? (€)</label>
                    </div>
                    <input type="hidden" name="func" value="3">
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
            <div class="col-12 text-center">
                <!-- muestra el salario actual del que dispone el usuario y sus compras-->
                <h5>Your current salary: </h5> <?php echo $bbdd->getSaldo($_SESSION['login']).'€'; ?>
                <h5>How many CDs have you bought?:</h5> <?php echo $bbdd->getCompras($_SESSION['login']); ?>
            </div>
        </div>
    </div>
</section>