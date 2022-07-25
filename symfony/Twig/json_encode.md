# Encode a .yml file to json with `json_encode()` function and `raw` filter
```yml
# import
imports:
    - { resource: ../parameters/custom_parameters_file.yml }
```
```yml
# import this file following the above steps
parameters:  in /app/config/parameters/custom_parameters_file.yml for example
    admanager_desktop:
        - breadcrumb: '/49787872/futbolred/Home/Billboard'
          tagId: 'div-gpt-ad-1618947981632-0'
          sizes:
              - width: 728
                height: 90
              - width: 1200
                height: 250
              - width: 970
                height: 250
              - width: 970
                height: 90
        - breadcrumb: /49787872/futbolred/Home/barra_flotante_inferior
          tagId: div-gpt-ad-1618948086384-0
          sizes:
              - width: 728
                height: 90
              - width: 970
                height: 90
              - width: 970
                height: 30
        ...
```
```yml
# Twig Configuration
twig:
    globals:
        admanager_desktop: %admanager_desktop%
```
```twig
window.adManagerConfig = {{ admanager_desktop | json_encode() | raw }}
```
