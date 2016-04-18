# Bootstrap Twig Bundle

The bundle requires Bootstrap to be already installed ([download here](https://getbootstrap.com/getting-started/#download)).

## API Doc
 
- Btn("***text***")
- Label("***text***")
- md(***value***, ***offset***)
- sm(***value***, ***offset***)
- xs(***value***, ***offset***)
- lg(***value***, ***offset***)
- Well("***text***")
- Badge("***text***")
- Strong("***text***")
- Small("***text***")
- PageHeader("***text***")
- ProgressBar(…)
- Min("***value***")
- Max("***value***")
- Now("***value***")
- Type("***text***")
- LinkTo("***URL***")

## Twig DSL

### Grid system > Containers

This block will be translated to the Bootstrap container class.

```HTML
{% container %}
    <h1>It works</h1>
{% endcontainer %}
```

### Grid > rows and columns

To define a column the syntax is {% col(***type***(***size***)) %} … {% endcol %}. Supported types are: md, sm, lg and xs.

```HTML
{% row %}
    {% col(md(4)) %}.col-md-4{% endcol %}
    {% col(md(4)) %}.col-md-4{% endcol %}
    {% col(md(4)) %}.col-md-4{% endcol %}
{% endrow %}

{% row %}
    {% col(md(8)) %}.col-md-8{% endcol %}
    {% col(md(4)) %}.col-md-4{% endcol %}
{% endrow %}
```

For additionnal grid option you can pass ***type***(***size***) separted with commas to the col function. For example:

```HTML
{% row %}
    {% col(md(6), sm(6), xs(11)) %}.col-md-6 .col-sm-6 .col-xs-11{% endcol %}
    {% col(md(6), sm(6), xs(1)) %}.col-md-6 .col-sm-6 .col-xs-1{% endcol %}
{% endrow %}
```

Offsetting columns, example:
```HTML
{% row %}
    {% col(md(4)) %}.col-md-4{% endcol %}
    {% col(md(4, 4)) %}.col-md-4 .col-md-offset-4{% endcol %}
{% endrow %}

{% row %}
    {% col(md(3, 3)) %}.col-md-3 .col-md-offset-3{% endcol %}
    {% col(md(3, 3)) %}.col-md-3 .col-md-offset-3{% endcol %}
{% endrow %}

{% row %}
    {% col(md(6, 3)) %}.col-md-6 .col-md-offset-3{% endcol %}
{% endrow %}
```

### Buttons

The syntax is {{ Btn.***type***("***text***") }} or {{ Btn("***text***") }} for default. The supported types are: primary, success, info, warning, danger and link.

Examples :
```Handlebar
{{ Btn.warning("This is an warning boutton") }}
{{ Btn.success("This is a success boutton") }}
```

You can use dynamic types, see the following example: 
```Handlebar
{{ Btn("This is an boutton", Type("success")) }}
```

Boutton supports link by providing a LinkTo argument, see the following example:
```Handlebar
{{ Btn("This is an boutton with a link", Type("success"), LinkTo("http://google.fr")) }}
```

### Alerts

```Handlebar
{{ Alert.success(Strong("Well done!") ~ " You successfully read this important alert message.") }}
{{ Alert.info(Strong("Heads up!") ~ " This alert needs your attention, but it's not super important.") }}
{{ Alert.warning(Strong("Warning!") ~ " Better check yourself, you're not looking too good.") }}
{{ Alert.danger(Strong("Oh snap!") ~ " Change a few things up and try submitting again.") }}
```

### Pager

```HTML
{% pager %}
    {{ Pager.previous("&larr; Older")|raw }} {{ Pager.next("Newer &rarr;") }}
{% endpager %}
 ```
 
### Page header

```Handlebar
{{ PageHeader("Example page header " ~ Small("Subtext for header")) }}
 ```
 
### Well

```Handlebar
{{ Well("Look, I'm in a well!") }}
{{ Well("Look, I'm in a large well!", lg()) }}
{{ Well("Look, I'm in a small well!", sm()) }}
 ```
 
### Badge

```Handlebar
{{ Badge(45) }}
 ```

### Labels

```Handlebar
{{ Label("Default") }}
{{ Label.primary("Primary") }}
{{ Label.success("Success") }}
{{ Label.info("Info") }}
{{ Label.warning("Warning") }}
{{ Label.danger("Danger") }}
 ```
 
### Progress bars

Now value is required.

```Handlebar
{{ ProgressBar.success(Now(40), Min(0), Max(100)) }}
{{ ProgressBar.info(Now(20), Min(0), Max(100)) }}
{{ ProgressBar.warning(Now(60), Min(0), Max(100)) }}
{{ ProgressBar.danger(Now(80), Min(0), Max(100)) }}
 ```
 
Stacked progress bar example:
```Handlebar
{{ ProgressBar( ProgressBar.success(Now(35)), ProgressBar.warning(Now(20)), ProgressBar.danger(Now(10)) ) }}
```