<div style="width: 17%; margin: auto; margin-top: 5%;">
  <form action="index.php?uc=administrer&action=updateProduit" method="POST">
    
    <!-- Description input -->
    <div data-mdb-input-init class="form-outline mb-4">
      <input type="text" id="description" class="form-control" name="description" value="<?php echo $produit[0]->description ?>"/>
      <label class="form-label" for="login">Description</label>
    </div>

    <!-- prix input -->
    <div data-mdb-input-init class="form-outline mb-4">
      <input type="number" id="prix" class="form-control" name="prix" value="<?php echo $produit[0]->prix ?>"/>
      <label class="form-label" for="pass">prix</label>
    </div>

    <select name="categories" class="form-select form-select-sm">
        <?php foreach ($categories as $categorie) { ?>
            <option value="<?php echo htmlspecialchars($categorie->id); ?>"
                <?php echo ($categorie->id === $produit[0]->idCategorie) ? 'selected' : ''; ?>>
                <?php echo htmlspecialchars($categorie->libelle); ?>
            </option>
        <?php } ?>
    </select>   
    <br><br>

    <!-- Submit button -->
    <input type="submit" class="btn btn-primary btn-block mb-4" value="Savegarder">
  </form>
</div>  