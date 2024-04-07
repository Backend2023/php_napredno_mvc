
# PHP MVC

Jednostavni MVC

## Kako pokrenuti aplikaciju lokalno

Koliraj repo

```bash
  git clone https://github.com/erikfakin/php_napredno_mvc.git
```

Otvori folder projekta

```bash
  cd php_napredno_mvc
```

Instaliraj potrebne dependencies

```bash
  composer update
```

Pokreni sql skriptu za kreiranje i seedanje baze podataka

```bash
  mvcquiz.sql -> preko mysql cli-a: source file_name.sql 
  ili
  otvori mvcquiz.sql u HeidiSQL ili slicno
```

Pokreni PHP server iz public foldera

```bash
  cd public/
  php -S localhost:8000
```

