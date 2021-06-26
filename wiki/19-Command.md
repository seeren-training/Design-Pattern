# Command

*  🔖 **Définition**
*  🔖 **Implémentation**

___

## 📑 Définition

L'utilisation du modèle de conception de commande peut résoudre ces problèmes:

* Il convient d'éviter de coupler l'invocateur d'une demande à une demande particulière. C'est-à-dire que les demandes câblées doivent être évitées.
* Il devrait être possible de configurer un objet (qui invoque une requête) avec une requête.

L'implémentation d'une requête directement dans une classe est inflexible car elle couple la classe à une requête particulière au moment de la compilation, ce qui rend impossible la spécification d'une requête au moment de l'exécution.

![image](./resources/Command.jpg)

L'utilisation du modèle de conception de commande décrit la solution suivante:

* Définissez des objets (de commande) distincts qui encapsulent une demande.
* Une classe délègue une requête à un objet de commande au lieu d'implémenter directement une requête particulière.

Cela permet de configurer une classe avec un objet de commande qui est utilisé pour effectuer une requête. La classe n'est plus couplée à une requête particulière et n'a aucune connaissance de la manière dont la requête est exécutée.

___

## 📑 Implémentation

*Command*

```php

public class SwitchCommand implements Command
{

    private array $commands = [];

    public function register(string $name, Command $command) {
        $this->command[$name] = $command;
    }

    public function execute(string $name) {
        $this->commands[$name].execute();        
    }

}
```

*Receiver*

```php
interface Command 
{
    public execute();
}

public class FlipUpCommand implements Command
{

   public function execute()
   {
      echo 'Turn on' . "\n";
   }

}

public class FlipDownCommand implements Command
{

   public function execute()
   {
      echo 'Turn off' . "\n";
   }

}
```

*Utilisation*

```php
$command = new SwitchCommand();
$command->register("on", new FlipUpCommand());
$command->register("off", new FlipDownCommand());
$command->execute("on");
$command->execute("off");
```