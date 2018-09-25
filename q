 .idea/php.xml                            |  43 [32m++++++++++++[m
 .idea/vcs.xml                            |   6 [32m++[m
 composer.json                            |   6 [32m+[m[31m-[m
 composer.lock                            | 272 [32m++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++[m[31m-[m
 src/Commands/InputParserCommand.php      |  21 [32m++++[m[31m--[m
 src/Services/ParseType/DateType.php      |  85 [32m++++++++++++++++++++++[m
 src/Services/ParseType/PriorityType.php  |  37 [32m++++++++++[m
 src/Services/ParseType/TagType.php       |  43 [32m++++++++++++[m
 src/Services/ParseType/Type.php          |  20 [32m++++++[m
 src/Services/Parser.php                  |  26 [32m+++++++[m
 src/Tests/DummyTest.php                  |  17 [31m-----[m
 src/Tests/ParseType/DateTypeTest.php     |  79 [32m+++++++++++++++++++++[m
 src/Tests/ParseType/PriorityTypeTest.php |  51 [32m++++++++++++++[m
 src/Tests/ParseType/TagTypeTest.php      |  47 [32m+++++++++++++[m
 14 files changed, 730 insertions(+), 23 deletions(-)
