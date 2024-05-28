import mysql.connector
from datetime import datetime, timedelta
import random
import string

# Функция для генерации ключа
def generate_key(length=32):
    characters = string.ascii_letters + string.digits
    return ''.join(random.choice(characters) for i in range(length))

# Подключение к базе данных
mydb = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="Brazhnik"
)

# Первая дата и последняя дата
start_date = datetime(2024, 6, 17)
end_date = datetime(2024, 6, 30)

# Перебор дат
current_date = start_date
while current_date <= end_date:
    # Пропуск праздников и выходных (суббота и воскресенье)
    if current_date.weekday() >= 5:
        current_date += timedelta(days=1)
        continue
    
    # Генерация времени с 9:00 до 17:00 каждый час
    current_time = datetime(current_date.year, current_date.month, current_date.day, 9)
    while current_time.hour < 17:
        # Добавление записи в базу данных
        cursor = mydb.cursor()
        sql = "INSERT INTO consultation (date, time, consultation_key) VALUES (%s, %s, %s)"
        val = (current_date.strftime("%Y-%m-%d"), current_time.strftime("%H:%M:%S"), generate_key())
        cursor.execute(sql, val)
        mydb.commit()
        print("Record inserted for:", current_date.strftime("%Y-%m-%d"), current_time.strftime("%H:%M:%S"))
        
        # Увеличение времени на 1 час
        current_time += timedelta(hours=1)
    # Переход к следующей дате
    current_date += timedelta(days=1)

# Закрытие соединения с базой данных
mydb.close()
