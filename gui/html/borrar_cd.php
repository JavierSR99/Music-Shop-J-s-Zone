<div class="container py-3">
    <div class="row">
        <div class="col-12 text-center">
            <h2>BORRAR CD</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form>
                <div class="form-group">
                    <label for="cd">CD a borrar</label>
                    <select id="cd" name="cd" required>
                        <option selected disabled>Select CD</option>
                        <?php
                        $app = new App();
                        try {
                            $options=$app->mostrarSelectCD();
                            echo $options;
                        } catch (Exception $exception) {
                            $exception->getMessage();
                        }
                        ?>
                    </select>
                </div>
                <input type="hidden" name="func" value="1" >
                <button type="submit" class="btn btn-primary">Delete</button>
            </form>
        </div>
    </div>
</div>