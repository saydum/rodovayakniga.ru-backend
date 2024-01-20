# Routes

## 1. WEB
1.1 Главная страница 
- /

1.2 Посты
- /blog/posts
- /blog/posts/{post}

1.3 Сгенерированная ссылка на РОДовое Древо
- /tree/{human}/{link}
---

## 2. APP

### 2.1 РОДовое Древо
- /trees
- /trees/store
- /trees/{tree}/show
- /trees/{tree}/edit
- /trees/{tree}/update
- /trees/{tree}/delete

2.1.1 Получение Humans по Tree id
- /trees/{tree}/humans

### 2.2 Humans Человек
- /humans
- /humans/store
- /humans/{human}/show
- /humans/{human}/edit
- /humans/{human}/update
- /humans/{human}/delete

### 2.3 TreeLink Ссылки
- /tree-links
- /tree-links/store
- /tree-links/{link}/show
- /tree-links/{link}/edit
- /tree-links/{link}/update
- /tree-links/{link}/delete

### 2.4 User
- /register
- /login
- /logout
- /reset-password
- /verify-email
- /google-login
- /google-register
