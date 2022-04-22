<h1>Main Index</h1>

<?php if (!empty($names)) {
    foreach ($names as $name) {
        echo $name->id . " => " . $name->name . "<br>" . "\n";
    }
}