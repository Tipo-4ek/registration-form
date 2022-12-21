[![License: GPL v3](https://img.shields.io/badge/License-GPLv3-blue.svg)](https://www.gnu.org/licenses/gpl-3.0)
# What is this
+ Registration form for the event/scientific conference. I did it for my university. The form has front-end validation (natively using bootstrap + server validation + error message notification to the user), the results are uploaded to a csv file suitable for excel

# How it Use
### Config parameters
+ In ```index.php``` [insert your connection to database data](https://github.com/Tipo-4ek/registration-form/blob/master/index.php#L3)

### Requirements
+ Bootstrap 5.2 (with jquery). For simplicity, I put a link to the CDN, it is not recommended to save the package of the desired Bootstrap version in files and link to it
+ Php 7.4+
### Database
+ Using MySQL + PhpMyAdmin
+ For each input with a datalist inside, you need to use a separate table with fields inside and a script like ```/form/get_short_edu.php```. Table scheme example:

| id (a/i)       | name         |
| ------------- |:-------------:|
| 1      | value1 |
| 2      | value2      |
| 3 | value3      |

#### Features
+ All requirement fields mark red circle automaticly
+ Front-end validation (native bootstrap form)
+ Back-end validation. Checks the existence of variables and the correspondence to the existing value of the field (only for fields with datalist). Returns human-readable errors
+ Table section has relate with table subsections (One --> Many). So the schema of these two tables is slightly different from the rest:

**section:**
| id (a/i)       | name         |
| ------------- |:-------------:|
| 1      | value1 |
| 2      | value2      |
| 3 | value3      |

**subsection**
| id (a/i)      | section_id (--> section.id) | name         |
| ------------- | ----------- |:-----------:|
| 1             | 1           | value1      |
| 2             | 2           | value2      |
| 3             | 2           | value3      |


# Examples
+ You can take sql exports in ```/example/all_tables.sql```

![Example screenshot](https://user-images.githubusercontent.com/54442928/208985122-598f31c6-9a34-4f55-9e79-40eade0e9bd4.png)
