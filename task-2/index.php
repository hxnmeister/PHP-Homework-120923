<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="style.css">
            <title>Text Formater</title>
        </head>
        <body>
            <div>
                <form action="./result.php" method="post">
                    <label for="text-to-format">Text:</label>
                    <textarea name="textfield" id="text-to-format" cols="30" rows="7" required></textarea>
                    <br>

                    <label for="font">Font Family:</label>
                    <select name="fontpicker" id="font-family">
                        <option value="Arial, Helvetica, sans-serif">Arial</option>
                        <option value="Verdana, Geneva, Tahoma, sans-serif">Verdana</option>
                        <option value="Georgia, Times New Roman, Times, serif">Georgia</option>
                        <option value="Courier New, Courier, monospace">Courier</option>
                        <option value="Times New Roman, Times, serif">Times New Roman</option>
                    </select>
                    <br>
                    
                    <label for="size">Font Size:</label>
                    <input type="number" name="fontsize" step="1" min="10" max="50" value="10" id="size">
                    <br>

                    <input type="checkbox" name="fontstyle[]" value="bold" id="style-bold">
                    <label for="style-bold"><b>Bold</b></label>
                    <br>
                    <input type="checkbox" name="fontstyle[]" value="italic" id="style-italic">
                    <label for="style-italic"><i>Italic</i></label>
                    <br>
                    <input type="checkbox" name="fontstyle[]" value="underline" id="style-underline">
                    <label for="style-underline"><u>Underline</u></label>
                    <br>

                    <label for="color">Color:</label>
                    <input type="text" name="fontcolor" value="Black" id="color">
                    <br>

                    <input type="submit" value="Format">
                </form>
            </div>
        </body>
    </html>