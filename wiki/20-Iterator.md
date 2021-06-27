# Iterator

*  🔖 **Définition**
*  🔖 **Implémentation**

___

## 📑 Définition

Quels problèmes le design pattern Iterator peut-il résoudre?

* Les éléments d'un objet agrégé doivent être accédés et traversés sans exposer sa représentation (structures de données).
* De nouvelles opérations de traversée doivent être définies pour un objet agrégé sans changer son interface.

![image](https://raw.githubusercontent.com/seeren-training/Design-Pattern/master/wiki/resources/Iterator.jpg)

Quelle solution le modèle de conception Iterator décrit-il ?

* Définissez un objet (itérateur) distinct qui encapsule l'accès et la traversée d'un objet agrégé.
* Les clients utilisent un itérateur pour accéder et parcourir un agrégat sans connaître sa représentation (structures de données).

___

## 📑 Implémentation

*Iterator*

```php
class BookList implements Iterator
{
    
    private $books = [];

    private $index = 0;

    public function addBook(string $book): self
    {
        $this->books[] = $book;
        return $this;
    }

    public function rewind()
    {
        $this->index = 0;
    }

    public function current()
    {
        return $this->books[$this->index];
    }

    public function key()
    {
        return $this->index;
    }

    public function next()
    {
        ++$this->index;
    }

    public function valid()
    {
        return array_key_exists($this->index, $this->books);
    }

}
```

*Utilisation*

```php
$bookList = (new BookList())
    ->add("Foo");
    ->add("Bar");
    ->add("Baz");
foreach($bookList as $book) {
    var_dump($book);
}
```
