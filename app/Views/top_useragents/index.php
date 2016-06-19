<?php
/**
 * @Author: Daniel Lozano
 * @Date:   2016-06-19 08:28:42
 * @Last Modified by:   Daniel Lozano
 * @Last Modified time: 2016-06-19 19:30:44
 */
?>
<!-- Jumbotron Header -->
<header class="jumbotron hero-spacer">
    <h1>TOP User Agent</h1>
    <p>Please, fill the form to generate a list of the TOP user agent that visits a certain campaign.</p>
    </p>
</header>

<hr>

<!-- Title -->
<div class="row">
    <div class="col-lg-12">
        <h3>TOP user agent filter</h3>
    </div>
</div>
<!-- /.row -->

<!-- Form -->
<div class="row">

    <form class="form-inline" method="GET">
        <div class="form-group">
            <label class="sr-only" for="created_at">Date</label>
            <input type="date" class="form-control" name="created_at" placeholder="Date" value="<?= $_GET['created_at'] ?>">
        </div>
        <div class="form-group">
            <label class="sr-only" for="id_campaign">Campaign ID</label>
            <input type="text" class="form-control" name="id_campaign" placeholder="Campaign ID" value="<?= $_GET['id_campaign'] ?>">
        </div>
        <div class="form-group">
            <label class="sr-only" for="id_campaign">Select range</label>
            <select class="form-control" name="top">
                <option value="5" <?= ($_GET['top'] == 5) ? 'selected' : '' ?>>TOP5</option>
                <option value="10" <?= ($_GET['top'] == 10) ? 'selected' : '' ?>>TOP10</option>
                <option value="20" <?= ($_GET['top'] == 20) ? 'selected' : '' ?>>TOP20</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Generate TOP</button>
        <a href="" class="btn btn-danger">Erase</a>
    </form>

</div>
<!-- /.row -->