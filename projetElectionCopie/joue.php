<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/@jarstone/dselect/dist/css/dselect.css">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <title>Document</title>
</head>
<body>
 
<form action="" method="post">
<select  class="form-select" id="dselect-example" name="cmb">
    <option value="chrome">Chrome</option>
    <option value="firefox" <?php if(isset($_POST['cmb']) && $_POST['cmb']==="firefox"){ echo "selected";}?> >Firefox</option>
    <option value="safari" >Safari</option>
    <option value="edge">Edge</option>
    <option value="opera">Opera</option>
    <option value="brave">Brave</option>
</select>
<button type="submit">envoyer</button>
</form>

<script src="https://unpkg.com/@jarstone/dselect/dist/js/dselect.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script>
    const config = {
    search: true, // Toggle search feature. Default: false
    creatable: false, // Creatable selection. Default: false
    clearable: false, // Clearable selection. Default: false
    maxHeight: '360px', // Max height for showing scrollbar. Default: 360px
    size: '', // Can be "sm" or "lg". Default ''
}
dselect(document.querySelector('#dselect-example'), config)
    // dselect(document.querySelector('#dselect-example'))
</script>
    
</body>
</html>