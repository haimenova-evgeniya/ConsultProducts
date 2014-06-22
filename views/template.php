<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Поступление товара</title>
  <link type="text/css" href="css/style.css" rel="stylesheet">
  <script type="text/javascript" src="js/jquery-1.11.1.js"></script>
  <script type="text/javascript" src="js/script.js"></script>
</head>
  <body>
    <div class="w-page-header">
      <div class="page-header content">
        <h1>Поступление товара</h1>
      </div>
    </div>         
    <div class="page-wrap">
      <div class="content">
        <div class="block-add-product">
          <form action="ajax/add_product.php" name = "product" method="POST" id="add-form">
            <table width="100%">
                <tr>
                  <td>
                    <label>Штрих-код:</label><input type="text" name="barcode">
                  </td>
                  <td>
                    <label>Наименование:</label><input type="text" name="name-product">
                  </td>
                  <td>
                    <label>Описание:</label><input type="text" name="description">
                  </td>
                  <td>
                    <label>Категория:</label><input type="text" name="category">
                  </td>
                </tr>
                <tr>
                  <td>
                    <label>Закупочная цена:</label><input type="text" name="purchase-price">
                  </td>
                  <td>
                    <label>Розничная цена:</label><input type="text" name="retail-price">
                  </td>
                  <td>
                    <label>Количество:</label><input type="text" name="amount">
                  </td>
                  <td>
                  <input type="submit" name="button-add-product" value="Добавить">
                  </td>
                </tr>
            </table>
          </form>
        </div> 
        <div class="block-list-product"> 
          <h3>Список товаров</h3>
          <table id="list-product" style="width:100%">
            <thead>
              <tr>
                <th>
                  Штрих-код
                </th>
                <th>
                  Наименование
                </th>
                <th>
                  Описание
                </th>
                <th>
                  Категория
                </th>
                <th>
                  Закупочная цена
                </th>
                <th>
                  Розничная цена
                </th>
                <th>
                  Количество
                </th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($listProducts  as $value): ?>
                  <tr>
                    <td><?=$value['barcode']?></td>
                    <td><?=$value['name']?></td>
                    <td><?=$value['description']?></td>
                    <td><?=$value['category']?></td>
                    <td><?=$value['purchase_price']?></td>
                    <td><?=$value['retail_price']?></td>
                    <td><?=$value['amount']?></td>
                  </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div> 
      </div>
    </div>
  </body>
</html>