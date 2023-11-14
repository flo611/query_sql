<h1>Editer une photo </h1>
<form action="../../assets/php/controllers/photos/update_photos.php" method="POST">
        <div>
            <label for="id">Id</label>
            <input type="int" id="id" name="id">
        </div>
        <div>
            <label for="image">Image</label>
            <input type="text" id="image" name="image">
        </div>
        <div>
            <label for="name">Nom</label>
            <input type="text" id="name" name="name">
        </div>
        <div>
            <label for="description">Description</label>
            <input type="text" id="description" name="description">
        </div>
        <div>
            <label for="price">Price</label>
            <input type="int" id="price" name="price">
        </div>
        <div>
            <label for="destination">Destination</label>
            <input type="text" id="destination" name="destination">
        </div>
        <button type="submit">Envoyer</button>
    </form>