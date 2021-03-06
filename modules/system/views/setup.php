<h2>
    Configuration
</h2>

<?= Form::open(['name' => 'setupForm']) ?>
    <input type="hidden" name="postback" value="1" />

    <div class="form-elements" role="form">
        <div class="form-group text-field">
            <label for="advBackendUri" class="control-label">Backend URI</label>
            <div class="form-control-prefix">
                <span class="prefix"><?= Url::to('') ?></span>
                <input
                    id="advBackendUri"
                    name="backend_uri"
                    class="form-control"
                    value="<?= e(env('BACKEND_URI', '/backend')) ?>" />
            </div>
            <span class="help-block">To secure your application, use a custom address for accessing the admin panel.</span>
        </div>

        <div class="form-group">
            <label class="control-label">Database Engine</label>
            <div class="radio-group">
                <span>
                    <input
                        id="dbTypeSqlite"
                        name="db_type"
                        type="radio"
                        value="sqlite"
                        onchange="toggleDatabase(this)"
                        <?= env('DB_CONNECTION', 'sqlite') === 'sqlite' ? 'checked' : '' ?>
                    />
                    <label for="dbTypeSqlite">SQLite</label>
                </span>

                <span>
                    <input
                        id="dbTypeMysql"
                        name="db_type"
                        type="radio"
                        value="mysql"
                        onchange="toggleDatabase(this)"
                        <?= env('DB_CONNECTION') === 'mysql' ? 'checked' : '' ?>
                    />
                    <label for="dbTypeMysql">MySQL</label>
                </span>

                <span>
                    <input
                        id="dbTypePostgres"
                        name="db_type"
                        type="radio"
                        value="pgsql"
                        onchange="toggleDatabase(this)"
                        <?= env('DB_CONNECTION') === 'pgsql' ? 'checked' : '' ?>
                    />
                    <label for="dbTypePostgres">Postgres</label>
                </span>

                <span>
                    <input
                        id="dbTypeSqlsrv"
                        name="db_type"
                        type="radio"
                        value="sqlsrv"
                        onchange="toggleDatabase(this)"
                        <?= env('DB_CONNECTION') === 'sqlsrv' ? 'checked' : '' ?>
                    />
                    <label for="dbTypeSqlsrv">SQL Server</label>
                </span>
            </div>


        </div>

        <div id="configFormDatabase">
            <div class="form-group span-left">
                <label for="dbHost" class="control-label">Database Host</label>
                <input
                    id="dbHost"
                    name="db_host"
                    class="form-control"
                    value="<?= e(env('DB_HOST', 'localhost')) ?>"
                    />
                <span class="help-block">Hostname for the database connection.</span>
            </div>

            <div class="form-group span-right">
                <label for="dbHost" class="control-label">Database Port</label>
                <input
                    id="dbPort"
                    name="db_port"
                    class="form-control"
                    placeholder=""
                    value="<?= e(env('DB_PORT')) ?>"
                    />
                <span class="help-block">(Optional) A port for the connection.</span>
            </div>

            <div class="form-group">
                <label for="dbName" class="control-label">Database Name</label>
                <input
                    id="dbName"
                    name="db_name"
                    class="form-control"
                    value="<?= e(env('DB_DATABASE')) ?>"
                    />
                <span class="help-block">Specify the name of an empty database.</span>
            </div>

            <div class="form-group span-left">
                <label for="dbUser" class="control-label">Database Login</label>
                <input
                    id="dbUser"
                    name="db_user"
                    class="form-control"
                    value="<?= e(env('DB_USERNAME')) ?>"
                    />
                <span class="help-block">User with create database privileges.</span>
            </div>

            <div class="form-group span-right">
                <label for="dbPass" class="control-label">Database Password</label>
                <input
                    id="dbPass"
                    type="password"
                    name="db_pass"
                    class="form-control"
                    value="<?= e(env('DB_PASSWORD')) ?>"
                    />
                <span class="help-block">Password for the specified user.</span>
            </div>
        </div>

        <div id="configFormFile">
            <div class="form-group">
                <label for="dbName" class="control-label">Database Path</label>
                <input
                    id="dbName"
                    name="db_filename"
                    class="form-control"
                    value="<?= env('DB_CONNECTION') === 'sqlite' ? e(env('DB_DATABASE', 'storage/database.sqlite')) : 'storage/database.sqlite' ?>"
                    />
                <span class="help-block">For file-based storage, enter a path relative to the application root directory.</span>
            </div>
        </div>

        <div class="form-buttons">
            <button type="submit" class="btn btn-primary pull-right">
                Save and Continue
            </button>
        </div>
    </div>

<?= Form::close() ?>

<script>
    function toggleDatabase(el) {
        var selectedVal = el ? el.value : '<?= e(env('DB_CONNECTION', 'sqlite')) ?>';

        if (selectedVal == 'sqlite') {
            document.getElementById('configFormDatabase').style.display = 'none';
            document.getElementById('configFormFile').style.display = null;
        }
        else {
            document.getElementById('configFormFile').style.display = 'none';
            document.getElementById('configFormDatabase').style.display = null;
        }
    }

    toggleDatabase();
</script>
