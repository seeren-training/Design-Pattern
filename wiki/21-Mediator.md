# Mediator

*  🔖 **Définition**
*  🔖 **Implémentation**

___

## 📑 Définition

Quels problèmes le design pattern Mediator peut-il résoudre?

* Un couplage étroit entre un ensemble d'objets en interaction doit être évité.
* Il devrait être possible de modifier l'interaction entre un ensemble d'objets indépendamment.

![image](https://raw.githubusercontent.com/seeren-training/Design-Pattern/master/wiki/resources/Mediator.jpg)

Quelle solution le modèle de conception Mediator décrit-il ?

* Définissez un objet (médiateur) distinct qui encapsule l'interaction entre un ensemble d'objets.
* Les objets délèguent leur interaction à un objet médiateur au lieu d'interagir directement les uns avec les autres.

___

## 📑 Implémentation

*Mediator*

```php
class ChatRoom
{

    public function showMessage(User $user, String message): void
    {
        echo new Date() 
           . " ["
           . $user.getName() 
           . "] : "
           . $message);
    }

}
```

*Colleagues*

```php
class User
{

    private string $name;
    
    public function __construct(string $name)
    {
        $this->name  = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function sendMessage(string $message)
    {
        ChatRoom::showMessage($this, $message);
    }

}
```

*Utilisation*

```php
$robert = new User("Robert");
$john = new User("John");
$robert->sendMessage("Hi! John!");
$john->sendMessage("Hello! Robert!");
```
