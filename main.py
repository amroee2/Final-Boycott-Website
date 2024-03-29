import pandas as pd
from sqlalchemy import create_engine

# Database connection information
db_username = 'root'
db_password = 'Ahmadosh2022'
db_host = '127.0.0.1'
db_port = '3306'
db_name = 'boycott'

# CSV file path
csv_file_path = "C:/Users/User/Downloads/aliases.csv"

# Create SQLAlchemy engine to connect to MySQL database
engine = create_engine(f"mysql+mysqlconnector://{db_username}:{db_password}@{db_host}:{db_port}/{db_name}")
# if(engine):
#     print(1111)
# Read CSV file into a DataFrame
df = pd.read_csv(csv_file_path)

df = df[['id','alias_name']]
# df = df[['id',	'ar_name',	'type1'	,'type2'	,'barcode',	'en_name',	'support']]
# Rename columns as needed
df.rename(columns={'alias_name': 'alias_name', 'id': 'index'}, inplace=True)

# Insert data into MySQL database
# df.to_sql('aliases', con=engine, if_exists='append', index=False)
df.to_sql('aliases', con=engine, if_exists='append', index=False)
# print(df.head())
# Dispose of the engine to close the database connection
engine.dispose()

print("Data inserted successfully into MySQL database.")
