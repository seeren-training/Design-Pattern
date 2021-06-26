# Interpreter

*  🔖 **Définition**
*  🔖 **Implémentation**

___

## 📑 Définition

Quels problèmes le design pattern Interpreter peut-il résoudre?

* Une grammaire pour un langage simple doit être définie afin que les phrases de la langue puissent être interprétées.

Lorsqu'un problème survient très souvent, il peut être envisagé de le représenter sous forme de phrase dans un langage simple (Domain Specific Languages) afin qu'un interprète puisse résoudre le problème en interprétant la phrase.

![image](./resources/Interpreter.jpg)

Quelle solution le modèle de conception Interpreter décrit-il?

* Définissez une grammaire pour un langage simple en définissant une hiérarchie de classes Expression et en implémentant une opération interpret().
* Représenter une phrase dans le langage par un arbre de syntaxe abstraite (AST) composé d'instances d'Expression.
* Interprétez une phrase en appelant interpret() sur l'AST.



___

## 📑 Implémentation

*Expression*

```php
interface Expression
{
    public function interpreter(string $context): bool;
}
```

*Terminal expression*

```php
class TerminalExpression implements Expression 
{

    private string data;

    public function __construct(string $data)
    {
        $this->data = $data; 
    }

    public function interpreter(string $context): bool
    {
        return array_key_exists($this->data, $context);
    }

}
```

*Non Terminal expression*

```php
class OrExpression implements Expression 
{

    private Expression $expr1;

    private Expression $expr2;

    public function __construct (Expression $expr1, Expression $expr2) 
    {
        $this->expr1 = $expr1;
        $this->expr2 = $expr2;
    }

    public boolean interpreter(string $context) 
    {        
        return $this->expr1->interpreter($context) 
            || $this->expr2->interpreter($context);
    }

}

class AndExpression implements Expression 
{

    private Expression $expr1;

    private Expression $expr2;

    public function __construct (Expression $expr1, Expression $expr2) 
    {
        $this->expr1 = $expr1;
        $this->expr2 = $expr2;
    }

    public boolean interpreter(string $context) 
    {        
        return $this->expr1->interpreter($context) 
            && $this->expr2->interpreter($context);
    }

}
```

*Utilisation*

```php
$person1 = new TerminalExpression("Kushagra");
$person2 = new TerminalExpression("Lokesh");
$isSingle = new OrExpression(person1, person2);
var_dump($isSingle.interpreter("Lokesh")); // true
var_dump$isSingle.interpreter("Achint")); // false
    
$vikram = new TerminalExpression("Vikram");
$committed = new TerminalExpression("Committed");
$isCommitted = new AndExpression(vikram, committed);    
var_dump($isCommitted.interpreter("Committed, Vikram")); // true
var_dump($isCommitted.interpreter("Single, Vikram")); // false
```
