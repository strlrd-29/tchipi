# Tchi pi php - BDDA

## Author : strlrd-29 AKA ouassim

## How to clone this repo to your local machine?

1. The easy way ⚠⚠ **(not recommended for kohol)** is to use [Git](https://git-scm.com/) using the following command:

```bash
git clone https://github.com/strlrd-29/tp.git
```

2. The still pretty easy way **(Kohol edition (sofiane))** is to download the repo as a zip file and extract it inside the www folder that you will find in the installation folder.

![step1](/steps/11.png)

3. Rename the folder from `tchipi-master` to `rentals`

![download](/steps/download.png)

                                        |

                                        ↓

![download2](/steps/download1.png)

<br />
<br />

4. Before running you project you need to create you db first, to do that download this [sql file](/car.sql) and open it in vscode.

5. After that you need to copy the path of the file by right clicking on the file name and select "copy path" as show in the picture below.

![step0](/steps/0.png)

6.Then open MySQL console by clicking on the wamp server icon then `MySQL` > `MySQL console`.

![step01](/steps/01.png)

7. In order to execute the sql file simply write `source ` followed by the path that you copied earlier and then press enter. in my case the file path was `D:\wamp64\www\rentals\car.sql` so my command would look like this:

```bash
source D:\wamp64\www\rentals\car.sql
```

![step02](/steps/02.png)

8. Now you can start the project by clicking on wamp server icon then on `localhost`

![localhost](/steps/localhost.png)

9. A browser window will open up and it will look like this:

![window](/steps/window.png)

10. you can now access the project by typing `localhost/rentals` in your browser.

![rentals](/steps/rentals.png)

11. That is all! now you can start coding! 🚀

<br />
<br />
<br />

## In question four where you have to retrieve cars based on location price using a stored procedure you first need to create the procedure in the database. You can do it by using the following command:

```sql

DELIMITER $$
CREATE PROCEDURE getCarsByPrice(IN car_price INT)
    BEGIN
        SELECT * FROM car WHERE priceByDay = car_price;
    END
$$

```

a. First you need to open phpMyAdmin in order to create the stored procedure in your db so in order to do that click on the wamp server icon and then select `PhpMyAdmin` > `PhpMyAdmin 5.1.1`

![step2](/steps/2.png)

b. After logging in to you account using `username`=root and a blank `password` select your db by simply clicking on the name of the database as shown in the screenshot below.

![step3](/steps/3.png)

c. Then click on the SQL tab on the top nav bar and paste the above code in order to create the stored procedure, then click on execute.

![step4](/steps/4.png)

![step5](/steps/5.png)

> Copy the command above then open phpMyAdmin and go to the SQL tab then paste your code there and click on "Execute" button.

## In case of problems, you can always reach out to me.

<br />
<br />

## Peace ✌.
