function emptyCheck()
{
    var bookPage = document.getElementById("booksID");
    var correct = true;

    if (bookPage.book_title.value == "")
    {
        correct = false;
        alert(emptyText("Book Title"))
    }
    if (bookPage.authors.value == "")
    {
        correct = false;
        alert(emptyText("Authors"))
    }
    if (bookPage.ISBN.value == "")
    {
        correct = false;
        alert(emptyText("ISBN"))
    }
    if (bookPage.publisher.value == "")
    {
        correct = false;
        alert(emptyText("Publisher"))
    }
    if (bookPage.edition.value == "")
    {
        correct = false;
        alert(emptyText("Edition"))
    }
    if (bookPage.year.value == "")
    {
        correct = false;
        alert(emptyText("Year"))
    }
    if (bookPage.chapters.value == "")
    {
        correct = false;
        alert(emptyText("Chapters"))
    }

    // Submit data if there are no empty fields
    if (correct)
    {
        bookPage.submit();
    }
}

function emptyText(text)
{
    var message = "This book must have an entry for the " + text + " field.";
    return message;
}