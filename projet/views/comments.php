<div class="comments">
    
    <div class="container">
    
        <h2>Les commentaires</h2>
        
        <!-- LISTE DE COMMENTAIRE GÉNÉRÉ VIA JAVASCRIPT-->
        <div class="list"></div>
        
        <!-- AJOUTER UN COMMENTAIRE SEULEMENT SI L'UTILISATEUR EST CONNECTÉ-->
        <?php if( !empty($_SESSION['userId']) ): ?>
            <form>
                <input id="textarea" type="textarea" name="comment" autocomplete="off"/>
                <input id="addComment" class="bttn hover" type="submit" value="Ajouter un commentaire"/>
            </form>
        <?php endif; ?>
    
    </div>
    
</div>