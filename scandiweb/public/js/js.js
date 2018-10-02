function getAttributeField(element) {
    $(".form-group-attribute").empty();
    if ($('select[name=category]').val() === '1') {
        $('.form-group-attribute').append('<label>Size</label><input name="size" type="number" min="1" placeholder="Enter Size" required><div class="label-description">Input integer in megabytes (example - 2400)</div>');
    } else if ($('select[name=category]').val() === '2') {
        $('.form-group-attribute').append('<label>Weight</label><input name="weight" type="number" min="0" step="0.1" placeholder="Enter Weight" required><div class="label-description">Input number in kilograms (example - 20 or 9,7)</div>');
    } else {
        $('.form-group-attribute').append(' <label>Height</label><input type="number" min="0" step="0.1" class="dimensions" name="height" placeholder="Enter Height" required><label>Width</label><input type="number" min="0" step="0.1" class="dimensions" name="width" placeholder="Enter Width" required><label>Length</label><input type="number" min="0" step="0.1" class="dimensions" name="length" placeholder="Enter Length" required><div class="label-description">Input each number in its input field<p> Example: </p><p>Height - 24</p><p>Width - 37,4</p><p>Length - 19,3</p></div>');
    }
}