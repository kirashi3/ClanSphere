<?php

echo cs_sql_count(__FILE__,'users', 'users_delete = 0 AND users_active = 1');