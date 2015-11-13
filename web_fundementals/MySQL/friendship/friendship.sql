SELECT   
	user.first_name, user.last_name, user2.first_name as friend_first_name, user2.last_name as friend_last_name
    FROM  
		users   
			LEFT JOIN   
		friends
				ON users.id = friends.user_id    
			LEFT JOIN
		users as user2 
			ON friends.friend_id = user2.id;