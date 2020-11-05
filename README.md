# HR aplikacija - Basic Auth

## Instrukcije za lokalno pokretanje:
- Instalirati XAMPP https://www.apachefriends.org/index.html i neki alat za slanje HTTP zahtjeva (npr. Postman https://www.postman.com/)
- Pokrenuti Apache web server i MySQL u XAMPP alatu
- Kroz phpMyAdmin odraditi import baze
- Za testiranje prikaza odjela u regiji/državi možemo posjetiti 'http://localhost:8000/departments' i ispuniti formu
- CRUD zahtjevi za entitet "Employee" mogu se testirati preko Postman alata
- Registracija na 'http://localhost:8000/register', Login: 'http://localhost:8000/login'


### Rest API
1. Employee - Prikaži sve
    GET 'http://localhost:8000/employeesJSON/'
2. Employee - Prikaži jednog
    GET 'http://localhost:8000/employeesJSON/{id}'
3. Employee - Dodaj
    POST 'http://localhost:8000/employeesJSON/'
        
    JSON body:
    ```
    Obavezna polja:
    {
        "employee_id": {id},
        "last_name": {prezime},
        "email": {email},
        "hire_date": {datum},
        "job_id": {id},
        "salary": {plaća}
    }
    Dodatna polja:
    {
        "first_name": {ime},
        "phone_number": {br.tel.},
        "commission_pct":{decimala},
        "manager_id": {id},
        "department_id": {odjel}
    }
    ```
4. Employee - Uredi
    PUT 'http://localhost:8000/employeesJSON/{id}'

    JSON body:
    ```
    Obavezna polja:
    {
        "last_name": {prezime},
        "email": {email},
        "hire_date": {datum},
        "job_id": {id},
        "salary": {plaća}
    }
    Dodatna polja:
    {
        "first_name": {ime},
        "phone_number": {br.tel.},
        "commission_pct":{decimala},
        "manager_id": {id},
        "department_id": {odjel}
    }
    ```
5. Employee - Obriši
    DELETE 'http://localhost:8000/employeesJSON/{id}'

