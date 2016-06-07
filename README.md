##Statister
###Statistics Maker plugin for OctoberCMS
####The plugin maks a powerfull statistics system in OctoberCMS backend panel based on YAML file you as a developer will write with specific easy rules.

###Main features
* General statistics.
* Specific fields.
* Ability to choose colors.
* Multilanguage Plugin
* Relational Statistics.
* Flexbility to choose what you want to show.

###Available languages
* en - English
* ar - العربية

###Installation
1. Create a folder named lilessam in your __root/plugins__ folder.
1. Upload folder __statister__ to __lilesssam__ folder.
1. Login into your backend control panel > __Statistics__.

###How to use Statister
####Statister is easy to use. All you need to do is opening config.yaml file and start writing your preferences.

###CONFIG.YAML RULES
* Every element in config.yaml file __MUST__ have 'label_p', 'label_s', 'table', 'last_field', 'last_field_label', 'class' attributes. Or you will get an exception.
* __label_p__ refers to the plural label of this table. __Ideas__ for example.
* __label_s__ refers to the singular label of this table __Idea__ for example.
* __table__ refers to the table name in database.
* __last_field__ refers to the last row field you want to show.
* __last_field_label__ refers to label which will describe the last field of the last row which will be showed.
* __class__ refers to path of the model class.

####If you like to specify some fields that are boolean which you want to show to the user you will have to define 'fields' attribute. (For example I have published ideas and unpublished ideas based on a coloumn in ideas table called 'published' and I want to show the user how many ideas is published and how many is not).

####FIELDS ATTRIBUTE RULES
* You'll have to define the first index as a number starts from zero.
* In every number you'll have to define __label__ , __col__ and __color__.
* __label__ refers to the label. (in our example I'll write 'Is Published')
* __col__ refers to the coloumn in database table which __MUST__ be boolean to specify which has the value of __FALSE__ and whoch has the value of __TRUE__ and __STATISTER__ only shows the rows number which has __TRUE__ on this field.
* __color__ refers to the color hex code for this coloumn.

####If you have a relations in this model you can also define __relations__ attribute.
####RELATIONS ATTRIBUTE RULES
* You'll have to define the first index as a number starts from zero.
* You have to specify model, col and label attributes.
* __model__ refers to models which have relation (belongsTo) the current model.
* __col__ refers the the coloumn you wanna show (latest row).
* __label__ refers to the label which describes what will be displayed


####Some Examples
```yaml
backend_users:
    label_p: 'Users'
    label_s: 'User'
    table: 'backend_users'
    last_field: 'login'
    last_field_label: 'Last user registered'
    class: '\Backend\Models\User'
    fields:
        0:
            label: 'Is Activated'
            col: 'is_activated'
            color: '#95b753'
        1:
            label: 'Is Superadmin'
            col: 'is_superuser'
            color: '#ccc'
gulfdata_islamvolunteers_idea:
    label_p: 'Ideas'
    label_s: 'Idea'
    last_field: 'title'
    last_field_label: 'Last idea created'
    table: 'gulfdata_islamvolunteers_idea'
    class: '\Gulfdata\Islamvolunteers\Models\Idea'
    fields:
        0:
            label: 'Is Published'
            col: 'published'
            color: '#95b753'

    relations:
        0:
            model: 'user'
            col: 'login'
            label: 'Last ideas user'
gulfdata_islamvolunteers_comments:
    label_p: 'Comments'
    label_s: 'Comment'
    last_field: 'comment'
    last_field_label: 'Last Comment'
    table: 'gulfdata_islamvolunteers_comments'
    class: '\Gulfdata\Islamvolunteers\Models\Comment'
    fields:
        0:
            label: 'Is Published'
            col: 'published'
            color: '#ccc'

    relations:
        0:
            model: 'user'
            col: 'login'
            label: 'Last user commented'
        1:
            model: 'idea'
            col: 'title'
            label: 'Last comments idea'

```


####Screenshot of result
![Image of Statister Result](http://i.imgur.com/QgYeiTD.png)
