<?php
/**
 * @Author: Daniel Lozano
 * @Date:   2016-06-19 08:28:42
 * @Last Modified by:   Daniel Lozano
 * @Last Modified time: 2016-06-20 08:58:27
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
    <div class="col-lg-12">
        <form class="form-inline" method="GET">
            <div class="form-group">
                <label class="sr-only" for="created_at">Date</label>
                <input type="date" class="form-control" name="created_at" placeholder="Date" value="<?= (isset($_GET['created_at'])) ? $_GET['created_at'] : ''?>">
            </div>
            <div class="form-group">
                <label class="sr-only" for="id_campaign">Campaign ID</label>
                <input type="text" class="form-control" name="id_campaign" placeholder="Campaign ID" value="<?= (isset($_GET['id_campaign'])) ? $_GET['id_campaign'] : '' ?>">
            </div>
            <div class="form-group">
                <label class="sr-only" for="id_campaign">Select range</label>
                <select class="form-control" name="top">
                    <option value="5" <?= (isset($_GET['top']) && $_GET['top'] == 5) ? 'selected' : '' ?>>TOP5</option>
                    <option value="10" <?= (isset($_GET['top']) && $_GET['top'] == 10) ? 'selected' : '' ?>>TOP10</option>
                    <option value="20" <?= (isset($_GET['top']) && $_GET['top'] == 20) ? 'selected' : '' ?>>TOP20</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Generate TOP</button>
            <a href="<?= $_SERVER['PATH_INFO'] ?>" class="btn btn-danger">Erase</a>
        </form>
    </div>
</div>
<!-- /.row -->

<hr />

<!-- Results -->
<div class="row">
    <div class="col-lg-12">
        <?php if (!empty($topUserAgents)): ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Pos.</th>
                            <th>Count</th>
                            <th>ID Country</th>
                            <th>ID Campaign</th>
                            <th>Device</th>
                            <th>O.S.</th>
                            <th>User Agent</th>
                            <th width="25%">Raw User Agent</th>
                            <th width="100">Created at</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($topUserAgents as $key => $topUserAgent): ?>
                            <tr>
                                <td>#<?= $key+1 ?></td>
                                <td><?= number_format($topUserAgent['count_http_useragent']); ?></td>
                                <td><?= $topUserAgent['id_country']; ?></td>
                                <td><?= $topUserAgent['id_campaign']; ?></td>
                                <td><?= $topUserAgent['user_agent']['device']; ?></td>
                                <td><?= $topUserAgent['user_agent']['os']; ?></td>
                                <td><?= $topUserAgent['user_agent']['ua']; ?></td>
                                <td><?= $topUserAgent['http_useragent']; ?></td>
                                <td><?= $topUserAgent['created_at']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table><!-- /.table table-striped table-hover -->
            </div><!-- /.table-responsive -->
        <?php elseif(!empty($_GET)) : ?>
            <p>Sorry, there's no records for this parameters.</p>
        <?php endif; ?>
    </div>
</div>
<!-- /.row -->