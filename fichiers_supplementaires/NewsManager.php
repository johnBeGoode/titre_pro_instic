<?php
abstract class NewsManager {

    // permet d'ajouter une news (en param celle à ajouter)
    abstract protected function add(News $news); // c'est la classe fille qui va réécrire la méthode d'où le abstract devant le fct

    // met à jour une news
    abstract protected function update(News $news);

    // supprime une news avec son identifiant
    abstract public function delete($id);

    // retourne une liste de news demandée.
    // en param: $debut-> 1ère news à sélectionner
    // $limite-> le nb de news à sélectionner
    // retourne la liste des news dans un array (chq entrée est une instance de News)
    abstract public function getList($debut = -1, $limite = -1);

    // retourne une news précise en fct de son id
    abstract public function getUnique($id);
    
    // renvoie le nb de news total
    abstract public function count();
    
    // permet d'enregistrer une news
    public function save(News $news) {
        if ($news->isValid()) {
            $news->isNew() ? $this->add($news) : $this->update($news);
        }
        else {
            throw new RuntimeException('La news doit être valide pour être enregistrée');
        }
    }

}