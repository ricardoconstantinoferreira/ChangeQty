The README.md file content is generated automatically, see [Magento module README.md](https://github.com/magento/devdocs/wiki/Magento-module-README.md) for more information.

# Ferreira_ChangeQty module



## Habilitar módulo

Basta ir no admin Stores -> Configuration -> Ferreira -> Ferreira Select e em Inform the Product Sku 
adicionar o sku do produto que queira destacar.

## Extensibilidade

Esse módulo não depende de nenhum terceiro, apenas dos módulos do magento que 
foram utilizados para fazer o trabalho.

## Informações adicionais

* Usei knockoutjs para trazer as informações no load da página, poderia ter usado
block ou viewModel, mas preferi knockoutjs para não encher o phtml de códigos php.
* Usei duas webapi para trazer as informações e mudar a quantidade de estoque, pois
achei simples, pois consegui criar os js mais separados nas suas pastas
* Para adicionar o block na home fiz um simples código no <b>cms_index_index.xml</b>, 
não vi necessidade de código complexo ali.
# ChangeQty
# ChangeQty
